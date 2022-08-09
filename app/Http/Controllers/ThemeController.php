<?php

namespace App\Http\Controllers;

use App\Index;
use App\Shop;
use App\Survey;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Artisan;

class ThemeController extends Controller
{
    public function index(Request $request)
    {
        /*if($request->get('test')) {

            $arrRes = [];
            $client = new \GuzzleHttp\Client();
            try {
                $res = $client->request('GET', 'https://shortlinkapi.okcs.com/api/v1/shortlink/GetLinkParamters?id=' . 154);

                if ($res->getStatusCode() == 200) {
                    if ($res->getBody()) {
                        $arrRes = json_decode($res->getBody()->getContents(), true);
                        $arrRes = json_decode($arrRes, true);
                        dd($arrRes);
                    }
                }

            } catch (GuzzleHttp\Exception\ClientException $e) {
                abort(500);
            }
            dd('ddd');

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://shortlinkapi.okcs.com/api/v1/shortlink/GetLinkParamters?id=2',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
            ));

            $response = curl_exec($curl);

            curl_close($curl);

            if($response)
            {
                echo $response;
            }
            else
            {
                echo 'Curl error: ' . curl_error($curl);
            }


            die();

            $client = new \GuzzleHttp\Client();
            try {
                $res = $client->request('GET', 'http://OKDC20060.OKSRV.IR:8015/api/v1/shortlink/GetLinkParamters?id=154');
                dd($res->getBody());
            } catch (GuzzleHttp\Exception\ClientException $e) {
                return 'sss';
            }
        }*/

        if ($request->get('s')) {

            $shop = Shop::where([
                ['shop_code', trim($request->get('s'))]
            ])->select('name', 'shop_code', 'city', 'state')->first();

            if(!$shop) {
                $client = new \GuzzleHttp\Client();
                $res = $client->request('GET', 'https://okcs.com/api/getstores?shop_code=' . trim($request->get('s')), [
                    'headers' => [
                        'Authorization' => 'Token GN3wJqddsEJjaJsdsEJja3xG'
                    ]
                ]);

                $shops = [];
                if ($res->getStatusCode() == 200) {
                    if ($res->getBody()) {
                        $arrRes = json_decode($res->getBody()->getContents(), true);
                        if (isset($arrRes['results']['data'])) {
                            $shops = $arrRes['results']['data'];
                        }
                    }
                }

                if(count($shops)) {
                    $shop = Shop::create([
                        'shop_code' => trim($shops[0]['shop_code']),
                        'name' => trim($shops[0]['name']),
                        'zone' => trim($shops[0]['mantaghe']),
                        'city' => trim($shops[0]['City']),
                        'state' => trim($shops[0]['Province']),
                    ]);
                }
            }
            $view['shop'] = $shop;
        }

        $mobile = trim($request->get('m'));
        if ($mobile && ($mobile[0] != "0" || $mobile[0] != 0)) {
            $mobile = "0" . $mobile;
        }
        $validator = Validator::make(['mobile' => $mobile], ['mobile' => ['required', 'min:11', 'max:11', 'regex:/09.[0-9]*$/']]);
        if ($validator->fails()) {
            abort(404);
        }
        $view['mobile'] = $mobile;

        $survey = Survey::where([
            ['mobile', $mobile],
            ['shop_code', trim($request->get('s'))],
            ['created_at', '>=', Carbon::now()->sub('hour', 24)->toDateTimeString()],
        ])->select('mobile', 'shop_code', 'point', 'strengths', 'weaknesses', 'comment')->first();

        if ($survey) {

            $view['survey'] = $survey;

            if ($survey->strengths) {
                $view['strengths'] = Index::whereIn('id', json_decode($survey->strengths, true))->orderBy('id', 'desc')->get();
            } else {
                $view['strengths'] = [];
            }

            if ($survey->weaknesses) {
                $view['weaknesses'] = Index::whereIn('id', json_decode($survey->weaknesses, true))->orderBy('id', 'desc')->get();
            } else {
                $view['weaknesses'] = [];
            }

        } else {
            $view['strengths'] = Index::where('type', 1)->orderBy('id', 'desc')->get();
            $view['weaknesses'] = Index::where('type', 2)->orderBy('id', 'desc')->get();
        }

        return view('index', $view);
    }

    public function setSurvey(Request $request)
    {
        if ($request->cookie('userInfo')) {
            throw ValidationException::withMessages(['point' => 'شما تا 24 ساعت نمیتواند رای مجدد دهید!']);
        }

        // validate
        $rules = [
            'point' => ['required', 'numeric', 'min:1', 'max:10', ],
            'mobile' => ['required', 'min:11', 'max:11', 'regex:/09.[0-9]*$/'],
            'shop_code' => ['required'],
            'comment' => ['nullable', 'max:200'],
        ];
        Validator::make($request->all(), $rules)->validate();

        $survey = Survey::where([
            ['mobile', trim($request->get('mobile'))],
            ['shop_code', trim($request->get('shop_code'))],
            ['created_at', '>=', Carbon::now()->sub('hour', 24)->toDateTimeString()],
        ])->count();

        if ($survey > 0) {
            throw ValidationException::withMessages(['point' => 'شما تا 24 ساعت نمیتواند رای مجدد دهید!']);
        }

        if ($request->get('mobile') && $request->get('shop_code')) {
            $weaknesses = [];
            if ($request->get('weaknesses') && count($request->get('weaknesses'))) {
                foreach ($request->get('weaknesses') as $item) {
                    if ($item) $weaknesses[] = $item;
                }
            }
            $strengths = [];
            if ($request->get('strengths') && count($request->get('strengths'))) {
                foreach ($request->get('strengths') as $item) {
                    if ($item) $strengths[] = $item;
                }
            }

            Survey::create([
                'mobile' => trim($request->get('mobile')),
                'shop_code' => trim($request->get('shop_code')),
                'point' => trim($request->get('point')),
                'strengths' => json_encode($strengths),
                'weaknesses' => json_encode($weaknesses),
                'comment' => $request->get('comment')
            ]);
        }
        return redirect()->route('homePage', ['m' => trim($request->get('mobile')), 's' => trim($request->get('shop_code')), 'result' => 'success'])->withCookie(cookie('userInfo', bcrypt(trim($request->get('mobile'))), 1440));
    }
}
