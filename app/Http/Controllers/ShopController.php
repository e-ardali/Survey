<?php

namespace App\Http\Controllers;

use App\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ExcelReader;

class ShopController extends Controller
{
    private $cities = '{"states":[{"name":"اتباع خارجی","cities":[{"name":"اتباع خارجی","coords":[]}]},{"name":"آذربایجان شرقی","cities":[{"name":"آذرشهر","coords":[]},{"name":"اسکو","coords":[]},{"name":"اهر","coords":[]},{"name":"بستان‌آباد","coords":[]},{"name":"بناب","coords":[]},{"name":"تبریز","coords":[]},{"name":"جلفا","coords":[]},{"name":"چاراویماق","coords":[]},{"name":"سراب","coords":[]},{"name":"شبستر","coords":[]},{"name":"عجب‌شیر","coords":[]},{"name":"کلیبر","coords":[]},{"name":"مراغه","coords":[]},{"name":"مرند","coords":[]},{"name":"ملکان","coords":[]},{"name":"میانه","coords":[]},{"name":"ورزقان","coords":[]},{"name":"هریس","coords":[]},{"name":"هشترود","coords":[]}]},{"name":"آذربایجان غربی","cities":[{"name":"ارومیه","coords":[]},{"name":"اشنویه","coords":[]},{"name":"بوکان","coords":[]},{"name":"پیرانشهر","coords":[]},{"name":"تکاب","coords":[]},{"name":"چالدران","coords":[]},{"name":"خوی","coords":[]},{"name":"سردشت","coords":[]},{"name":"سلماس","coords":[]},{"name":"شاهین‌دژ","coords":[]},{"name":"ماکو","coords":[]},{"name":"مهاباد","coords":[]},{"name":"میاندوآب","coords":[]},{"name":"نقده","coords":[]}]},{"name":"اردبیل","cities":[{"name":"اردبیل","coords":[]},{"name":"بیله‌سوار","coords":[]},{"name":"پارس‌آباد","coords":[]},{"name":"خلخال","coords":[]},{"name":"کوثر","coords":[]},{"name":"گرمی","coords":[]},{"name":"مشگین‌شهر","coords":[]},{"name":"نمین","coords":[]},{"name":"نیر","coords":[]}]},{"name":"اصفهان","cities":[{"name":"آران و بیدگل","coords":[]},{"name":"اردستان","coords":[]},{"name":"اصفهان","coords":[]},{"name":"برخوار و میمه","coords":[]},{"name":"تیران و کرون","coords":[]},{"name":"چادگان","coords":[]},{"name":"خمینی‌شهر","coords":[]},{"name":"خوانسار","coords":[]},{"name":"خوراسگان","coords":[]},{"name":"سمیرم","coords":[]},{"name":"سمیرم سفلی","coords":[]},{"name":"شهرضا","coords":[]},{"name":"شاهین شهر","coords":[]},{"name":"فریدن","coords":[]},{"name":"فریدون‌شهر","coords":[]},{"name":"فلاورجان","coords":[]},{"name":"کاشان","coords":[]},{"name":"گلپایگان","coords":[]},{"name":"لنجان","coords":[]},{"name":"مبارکه","coords":[]},{"name":"نائین","coords":[]},{"name":"نجف‌آباد","coords":[]},{"name":"نطنز","coords":[]}]},{"name":"البرز","cities":[{"name":"آسارا","coords":[]},{"name":"اشتهارد","coords":[]},{"name":"تنکمان","coords":[]},{"name":"چهارباغ","coords":[]},{"name":"هشتگرد","coords":[]},{"name":"طالقان","coords":[]},{"name":"فردیس","coords":[]},{"name":"کرج","coords":[]},{"name":"کمال شهر","coords":[]},{"name":"کوهسار","coords":[]},{"name":"گرمدره","coords":[]},{"name":"گلسار","coords":[]},{"name":"ماهدشت","coords":[]},{"name":"محمد دشت","coords":[]},{"name":"مشکین دشت","coords":[]},{"name":"نظر آباد","coords":[]}]},{"name":"ایلام","cities":[{"name":"آبدانان","coords":[]},{"name":"ایلام","coords":[]},{"name":"ایوان","coords":[]},{"name":"دره‌شهر","coords":[]},{"name":"دهلران","coords":[]},{"name":"سرابله","coords":[]},{"name":"شیروان و چرداول","coords":[]},{"name":"مهران","coords":[]}]},{"name":"بوشهر","cities":[{"name":"بوشهر","coords":[]},{"name":"تنگستان","coords":[]},{"name":"جم","coords":[]},{"name":"دشتستان","coords":[]},{"name":"دشتی","coords":[]},{"name":"دیر","coords":[]},{"name":"دیلم","coords":[]},{"name":"کنگان","coords":[]},{"name":"گناوه","coords":[]},{"name":"عسلویه","coords":[]}]},{"name":"تهران","cities":[{"name":"اسلام‌شهر","coords":[]},{"name":"بهارستان","coords":[]},{"name":"پاکدشت","coords":[]},{"name":"تهران","coords":[]},{"name":"دماوند","coords":[]},{"name":"رباط‌کریم","coords":[]},{"name":"ری","coords":[]},{"name":"ساوجبلاغ","coords":[]},{"name":"شمیرانات","coords":[]},{"name":"شهریار","coords":[]},{"name":"شهر قدس","coords":[]},{"name":"فشم","coords":[]},{"name":"فیروزکوه","coords":[]},{"name":"کرج","coords":[]},{"name":"نظرآباد","coords":[]},{"name":"ورامین","coords":[]}]},{"name":"چهارمحال و بختیاری","cities":[{"name":"اردل","coords":[]},{"name":"بروجن","coords":[]},{"name":"شهرکرد","coords":[]},{"name":"فارسان","coords":[]},{"name":"کوهرنگ","coords":[]},{"name":"لردگان","coords":[]}]},{"name":"خراسان جنوبی","cities":[{"name":"بیرجند","coords":[]},{"name":"درمیان","coords":[]},{"name":"سرایان","coords":[]},{"name":"سربیشه","coords":[]},{"name":"فردوس","coords":[]},{"name":"قائنات","coords":[]},{"name":"نهبندان","coords":[]}]},{"name":"خراسان رضوی","cities":[{"name":"بردسکن","coords":[]},{"name":"تایباد","coords":[]},{"name":"تربت جام","coords":[]},{"name":"تربت حیدریه","coords":[]},{"name":"چناران","coords":[]},{"name":"خلیل‌آباد","coords":[]},{"name":"خواف","coords":[]},{"name":"درگز","coords":[]},{"name":"رشتخوار","coords":[]},{"name":"سبزوار","coords":[]},{"name":"سرخس","coords":[]},{"name":"فریمان","coords":[]},{"name":"قوچان","coords":[]},{"name":"کاشمر","coords":[]},{"name":"کلات","coords":[]},{"name":"گناباد","coords":[]},{"name":"مشهد","coords":[]},{"name":"مه ولات","coords":[]},{"name":"نیشابور","coords":[]}]},{"name":"خراسان شمالی","cities":[{"name":"اسفراین","coords":[]},{"name":"بجنورد","coords":[]},{"name":"جاجرم","coords":[]},{"name":"شیروان","coords":[]},{"name":"فاروج","coords":[]},{"name":"مانه و سملقان","coords":[]}]},{"name":"خوزستان","cities":[{"name":"آبادان","coords":[]},{"name":"امیدیه","coords":[]},{"name":"اندیمشک","coords":[]},{"name":"اهواز","coords":[]},{"name":"ایذه","coords":[]},{"name":"باغ‌ملک","coords":[]},{"name":"بندر ماهشهر","coords":[]},{"name":"بهبهان","coords":[]},{"name":"خرمشهر","coords":[]},{"name":"دزفول","coords":[]},{"name":"دشت آزادگان","coords":[]},{"name":"رامشیر","coords":[]},{"name":"رامهرمز","coords":[]},{"name":"شادگان","coords":[]},{"name":"شوش","coords":[]},{"name":"شوشتر","coords":[]},{"name":"گتوند","coords":[]},{"name":"لالی","coords":[]},{"name":"مسجد سلیمان","coords":[]},{"name":"هندیجان","coords":[]}]},{"name":"زنجان","cities":[{"name":"ابهر","coords":[]},{"name":"ایجرود","coords":[]},{"name":"خدابنده","coords":[]},{"name":"خرمدره","coords":[]},{"name":"زنجان","coords":[]},{"name":"طارم","coords":[]},{"name":"ماه‌نشان","coords":[]}]},{"name":"سمنان","cities":[{"name":"دامغان","coords":[]},{"name":"سمنان","coords":[]},{"name":"شاهرود","coords":[]},{"name":"گرمسار","coords":[]},{"name":"مهدی‌شهر","coords":[]}]},{"name":"سیستان و بلوچستان","cities":[{"name":"ایرانشهر","coords":[]},{"name":"چابهار","coords":[]},{"name":"خاش","coords":[]},{"name":"دلگان","coords":[]},{"name":"زابل","coords":[]},{"name":"زاهدان","coords":[]},{"name":"زهک","coords":[]},{"name":"سراوان","coords":[]},{"name":"سرباز","coords":[]},{"name":"کنارک","coords":[]},{"name":"نیک‌شهر","coords":[]}]},{"name":"فارس","cities":[{"name":"آباده","coords":[]},{"name":"ارسنجان","coords":[]},{"name":"استهبان","coords":[]},{"name":"اقلید","coords":[]},{"name":"بوانات","coords":[]},{"name":"پاسارگاد","coords":[]},{"name":"جهرم","coords":[]},{"name":"خرم‌بید","coords":[]},{"name":"خنج","coords":[]},{"name":"داراب","coords":[]},{"name":"زرین‌دشت","coords":[]},{"name":"سپیدان","coords":[]},{"name":"شیراز","coords":[]},{"name":"فراشبند","coords":[]},{"name":"فسا","coords":[]},{"name":"فیروزآباد","coords":[]},{"name":"قیر و کارزین","coords":[]},{"name":"کازرون","coords":[]},{"name":"لارستان","coords":[]},{"name":"لامِرد","coords":[]},{"name":"مرودشت","coords":[]},{"name":"ممسنی","coords":[]},{"name":"مهر","coords":[]},{"name":"میمند","coords":[]},{"name":"نی‌ریز","coords":[]}]},{"name":"قزوین","cities":[{"name":"آبیک","coords":[]},{"name":"البرز","coords":[]},{"name":"بوئین‌زهرا","coords":[]},{"name":"تاکستان","coords":[]},{"name":"قزوین","coords":[]}]},{"name":"قم","cities":[{"name":"قم","coords":[]}]},{"name":"کردستان","cities":[{"name":"بانه","coords":[]},{"name":"بیجار","coords":[]},{"name":"دیواندره","coords":[]},{"name":"سروآباد","coords":[]},{"name":"سقز","coords":[]},{"name":"سنندج","coords":[]},{"name":"قروه","coords":[]},{"name":"کامیاران","coords":[]},{"name":"مریوان","coords":[]}]},{"name":"کرمان","cities":[{"name":"بافت","coords":[]},{"name":"بردسیر","coords":[]},{"name":"بم","coords":[]},{"name":"جیرفت","coords":[]},{"name":"راور","coords":[]},{"name":"رفسنجان","coords":[]},{"name":"رودبار جنوب","coords":[]},{"name":"زرند","coords":[]},{"name":"سیرجان","coords":[]},{"name":"شهر بابک","coords":[]},{"name":"عنبرآباد","coords":[]},{"name":"قلعه گنج","coords":[]},{"name":"کرمان","coords":[]},{"name":"کوهبنان","coords":[]},{"name":"کهنوج","coords":[]},{"name":"منوجان","coords":[]}]},{"name":"کرمانشاه","cities":[{"name":"اسلام‌آباد غرب","coords":[]},{"name":"پاوه","coords":[]},{"name":"ثلاث باباجانی","coords":[]},{"name":"جوانرود","coords":[]},{"name":"دالاهو","coords":[]},{"name":"روانسر","coords":[]},{"name":"سرپل ذهاب","coords":[]},{"name":"سنقر","coords":[]},{"name":"صحنه","coords":[]},{"name":"قصر شیرین","coords":[]},{"name":"کرمانشاه","coords":[]},{"name":"کنگاور","coords":[]},{"name":"گیلان غرب","coords":[]},{"name":"هرسین","coords":[]}]},{"name":"کهگیلویه و بویراحمد","cities":[{"name":"بویراحمد","coords":[]},{"name":"بهمئی","coords":[]},{"name":"دنا","coords":[]},{"name":"کهگیلویه","coords":[]},{"name":"گچساران","coords":[]}]},{"name":"گلستان","cities":[{"name":"آزادشهر","coords":[]},{"name":"آق‌قلا","coords":[]},{"name":"بندر گز","coords":[]},{"name":"ترکمن","coords":[]},{"name":"رامیان","coords":[]},{"name":"علی‌آباد","coords":[]},{"name":"کردکوی","coords":[]},{"name":"کلاله","coords":[]},{"name":"گرگان","coords":[]},{"name":"گنبد کاووس","coords":[]},{"name":"مراوه‌تپه","coords":[]},{"name":"مینودشت","coords":[]}]},{"name":"گیلان","cities":[{"name":"آستارا","coords":[]},{"name":"آستانه اشرفیه","coords":[]},{"name":"اَملَش","coords":[]},{"name":"بندر انزلی","coords":[]},{"name":"تالش","coords":[]},{"name":"رشت","coords":[]},{"name":"رضوانشهر","coords":[]},{"name":"رودبار","coords":[]},{"name":"رودسر","coords":[]},{"name":"سیاهکل","coords":[]},{"name":"شفت","coords":[]},{"name":"صومعه‌سرا","coords":[]},{"name":"طوالش","coords":[]},{"name":"فومَن","coords":[]},{"name":"لاهیجان","coords":[]},{"name":"لنگرود","coords":[]},{"name":"ماسال","coords":[]}]},{"name":"لرستان","cities":[{"name":"ازنا","coords":[]},{"name":"الیگودرز","coords":[]},{"name":"بروجرد","coords":[]},{"name":"پل‌دختر","coords":[]},{"name":"خرم‌آباد","coords":[]},{"name":"دورود","coords":[]},{"name":"دلفان","coords":[]},{"name":"سلسله","coords":[]},{"name":"کوهدشت","coords":[]}]},{"name":"مازندران","cities":[{"name":"آمل","coords":[]},{"name":"بابل","coords":[]},{"name":"بابلسر","coords":[]},{"name":"بهشهر","coords":[]},{"name":"تنکابن","coords":[]},{"name":"جویبار","coords":[]},{"name":"چالوس","coords":[]},{"name":"رامسر","coords":[]},{"name":"ساری","coords":[]},{"name":"سوادکوه","coords":[]},{"name":"فریدون کنار","coords":[]},{"name":"قائم‌شهر","coords":[]},{"name":"گلوگاه","coords":[]},{"name":"محمودآباد","coords":[]},{"name":"نکا","coords":[]},{"name":"نور","coords":[]},{"name":"نوشهر","coords":[]}]},{"name":"مرکزی","cities":[{"name":"آشتیان","coords":[]},{"name":"اراک","coords":[]},{"name":"تفرش","coords":[]},{"name":"خمین","coords":[]},{"name":"دلیجان","coords":[]},{"name":"زرندیه","coords":[]},{"name":"ساوه","coords":[]},{"name":"شازند","coords":[]},{"name":"کمیجان","coords":[]},{"name":"محلات","coords":[]}]},{"name":"هرمزگان","cities":[{"name":"ابوموسی","coords":[]},{"name":"بستک","coords":[]},{"name":"بندر عباس","coords":[]},{"name":"بندر لنگه","coords":[]},{"name":"جاسک","coords":[]},{"name":"حاجی‌آباد","coords":[]},{"name":"شهرستان خمیر","coords":[]},{"name":"رودان","coords":[]},{"name":"قشم","coords":[]},{"name":"کیش","coords":[]},{"name":"گاوبندی","coords":[]},{"name":"میناب","coords":[]}]},{"name":"همدان","cities":[{"name":"اسدآباد","coords":[]},{"name":"بهار","coords":[]},{"name":"تویسرکان","coords":[]},{"name":"رزن","coords":[]},{"name":"کبودرآهنگ","coords":[]},{"name":"ملایر","coords":[]},{"name":"نهاوند","coords":[]},{"name":"همدان","coords":[]}]},{"name":"یزد","cities":[{"name":"ابرکوه","coords":[]},{"name":"اردکان","coords":[]},{"name":"بافق","coords":[]},{"name":"تفت","coords":[]},{"name":"خاتم","coords":[]},{"name":"صدوق","coords":[]},{"name":"طبس","coords":[]},{"name":"مهریز","coords":[]},{"name":"میبد","coords":[]},{"name":"یزد","coords":[]}]}]}';

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * return list of states and cities by json format
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function cities(Request $request)
    {
        $obj_cities = json_decode($this->cities);
        $states = [];

        if (isset($request->state)) {
            foreach ($obj_cities->states as $key => $state) {

                if ($request->state == $state->name) {
                    $arr_state['id'] = $key;
                    $arr_state['name'] = $state->name;
                    $arr_state['cities'] = $state->cities;
                    $states = $arr_state;
                }
            }
        } else {
            foreach ($obj_cities->states as $key => $state) {

                $arr_state['id'] = $key;
                $arr_state['name'] = $state->name;
                $states[] = $arr_state;
            }
        }
        return response()->json($states);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // redirect result from another page
        if (isset($request->result)) {
            $view['result'] = ($request->result = 'success') ? success_msg() : error_msg();
        }

        $view['records'] = Shop::where(function ($query) use ($request) {
            if ($request->get('zone')) {
                $query->where('zone', $request->get('zone'));
            }
            if ($request->get('state')) {
                $query->where('state', 'LIKE', '%' . $request->get('state') . '%');
            }
            if ($request->get('city')) {
                $query->where('city', 'LIKE', '%' . $request->get('city') . '%');
            }
            if ($request->get('shop')) {
                $query->where('name', 'LIKE', '%' . $request->get('shop') . '%');
            }
        })->orderBy('id', 'desc')->paginate(30);

        // page info
        $view['page_group'] = 'shops';
        $view['page_title'] = 'فروشگاهها';
        $view['breadcrumb_items'] = [
            ['text' => 'فروشگاهها']
        ];

        return view('shops', $view);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'shop_code' => ['required', 'numeric', 'unique:shops,shop_code,Null,id,deleted_at,NULL'],
            'name' => ['required', 'string'],
            'zone' => ['nullable', 'numeric'],
            'city' => ['nullable', 'string'],
            'state' => ['nullable', 'string'],
        ])->validate();

        Shop::create([
            'shop_code' => $request->get('shop_code'),
            'name' => $request->get('name'),
            'zone' => $request->get('zone'),
            'city' => $request->get('city'),
            'state' => $request->get('state'),
        ]);

        return redirect()->route('shops.index', ['result' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Shop $shop
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop)
    {
        return redirect()->route('shops.edit', ['shop' => $shop->id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Shop $shop
     * @return \Illuminate\Http\Response
     */
    public function edit(Shop $shop)
    {
        $view['record'] = $shop;

        // page info
        $view['page_group'] = 'shops';
        $view['page_title'] = 'ویرایش ' . $shop->name;
        $view['breadcrumb_items'] = [
            ['text' => 'فروشگاهها', 'url' => route('shops.index')],
            ['text' => 'ویرایش ' . $shop->name]
        ];

        return view('shop_edit', $view);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Shop $shop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shop $shop)
    {
        // validate
        $rules = [
            'shop_code' => ['required', 'numeric', 'unique:shops,shop_code,' . $shop->id . ',id,deleted_at,NULL'],
            'name' => ['required', 'string'],
            'zone' => ['nullable', 'numeric'],
            'city' => ['nullable', 'string'],
            'state' => ['nullable', 'string'],
        ];
        Validator::make($request->all(), $rules)->validate();

        $shop->update([
            'shop_code' => $request->get('shop_code'),
            'name' => $request->get('name'),
            'zone' => $request->get('zone'),
            'city' => $request->get('city'),
            'state' => $request->get('state'),
        ]);

        return redirect()->route('shops.edit', ['shop' => $shop->id, 'result' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Shop $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop)
    {
        try {
            $shop->delete();
        } catch (\Exception $e) {
            return redirect()->route('shops.index', ['result' => 'failed']);
        }

        return redirect()->route('shops.index', ['result' => 'success']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function updateByExcel(Request $request)
    {
        Validator::make($request->all(), [
            'shops' => ['required', 'file'],
        ])->validate();

        $shops = Excel::toArray(new ExcelReader, $request->file('shops'));

        foreach ($shops[0] as $key => $item) {
            if (!is_numeric($item[0])) {
                throw ValidationException::withMessages([
                    'shops' => 'خطا در فایل ارسالی (خطا در ردیف : ' . ($key + 1) . ')'
                ]);
            }
            if ($item[0] == '' || $item[1] == '') {
                throw ValidationException::withMessages([
                    'shops' => 'خطا در فایل ارسالی (خطا در ردیف : ' . ($key + 1) . ')'
                ]);
            }

            Shop::updateOrCreate([
                'shop_code' => $item[0]
            ], [
                'name' => str_replace('فروشگاه ', '', $item[1]),
                'zone' => isset($item[2]) ? $item[2] : null,
                'state' => isset($item[3]) ? $item[3] : null,
                'city' => isset($item[4]) ? $item[4] : null,
            ]);
        }

        return redirect()->route('shops.index', ['result' => 'success']);
    }
}
