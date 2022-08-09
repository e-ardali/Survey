<?php

namespace App\Http\Controllers;

use App\Exports\SurveyExport;
use App\Shop;
use App\Survey;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SurveyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function surveyResult(Request $request)
    {
        $recordsQuery = Survey::select('id', 'mobile', 'shop_code', 'point', 'strengths', 'weaknesses', 'comment', 'created_at')
            ->with('shop:id,shop_code,name,zone,city,state');

        if ($request->get('zone')) {
            $recordsQuery->whereHas('shop', function ($q) use ($request) {
                $q->where('zone', $request->get('zone'));
            });
        }

        if ($request->get('state')) {
            $recordsQuery->whereHas('shop', function ($q) use ($request) {
                $q->where('state', 'LIKE', '%' . $request->get('state') . '%');
            });
        }

        if ($request->get('city')) {
            $recordsQuery->whereHas('shop', function ($q) use ($request) {
                $q->where('city', 'LIKE', '%' . $request->get('city') . '%');
            });
        }

        if ($request->get('shop')) {
            $recordsQuery->whereHas('shop', function ($q) use ($request) {
                $q->where('name', 'LIKE', '%' . $request->get('shop') . '%');
            });
        }

        if ($request->get('start_date')) {
            $recordsQuery->whereDate('created_at', '>=', g_date($request->get('start_date')));
        }

        if ($request->get('end_date')) {
            $recordsQuery->whereDate('created_at', '<=', g_date($request->get('end_date')));
        }

        if ($request->get('start_date') && $request->get('start_date') == $request->get('end_date')) {
            if ($request->get('start_time')) {
                $recordsQuery->whereTime('created_at', '>=', $request->get('start_time'));
            }
            if ($request->get('end_time')) {
                $recordsQuery->whereTime('created_at', '<=', $request->get('end_time'));
            }
        }

        if ($request->get('export') == 'xlsx') {
            return Excel::download(new SurveyExport($recordsQuery->get()), 'surveys.xlsx');
        } else {
            $view['records'] = $recordsQuery->latest()->paginate(20);
        }

        /*if ($records->total()) {
            $view['ave'] = round($records->sum('point') / $records->total(), 2);
        }*/

        // page info
        $view['page_group'] = 'surveys';
        $view['page_title'] = 'نظرات';
        $view['breadcrumb_items'] = [
            ['text' => 'نظرات']
        ];

        return view('surveys', $view);
    }
}
