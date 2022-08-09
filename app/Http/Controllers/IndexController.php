<?php

namespace App\Http\Controllers;

use App\Index;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
        $view['records'] = Index::orderBy('id', 'desc')->paginate(10);

        // page info
        $view['page_group'] = 'indices';
        $view['page_title'] = 'افزودن شاخص';
        $view['breadcrumb_items'] = [
            ['text' => 'شاخص ها']
        ];

        return view('indices', $view);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->route('indices.index', ['action' => 'create']);
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
            'title' => ['required', 'unique:indices,title,Null,id,deleted_at,NULL'],
            'type' => ['required']
        ])->validate();

        Index::create([
            'title' => trim($request->get('title')),
            'type' => trim($request->get('type')),
        ]);

        return redirect()->route('indices.index', ['result' => 'success']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Index $index
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Index $index)
    {
        $view['record'] = $index;

        // redirect result from another page
        if (isset($request->result)) {
            $view['result'] = ($request->result = 'success') ? success_msg() : error_msg();
        }

        // page info
        $view['page_group'] = 'indices';
        $view['page_title'] = 'ویرایش شاخص';
        $view['breadcrumb_items'] = [
            ['text' => 'شاخص ها', 'url' => route('indices.index')],
            ['text' => 'ویرایش شاخص']
        ];

        return view('index_edit', $view);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Index $index
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Index $index)
    {
        // validate
        $rules = [
            'title' => ['required', 'unique:indices,title,' . $index->id . ',id,deleted_at,NULL'],
            'type' => ['required']
        ];
        Validator::make($request->all(), $rules)->validate();

        $index->update([
            'title' => trim($request->get('title')),
            'type' => trim($request->get('type'))
        ]);

        return redirect()->route('indices.edit', ['index' => $index->id, 'result' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Index $index
     * @return \Illuminate\Http\Response
     */
    public function destroy(Index $index)
    {
        try {
            $index->delete();
        } catch (\Exception $e) {
            return redirect()->route('indices.index', ['result' => 'failed']);
        }

        return redirect()->route('indices.index', ['result' => 'success']);
    }
}
