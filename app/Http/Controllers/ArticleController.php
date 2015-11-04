<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class ArticleController extends Controller
{
    private $validator;
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth');
        $rules = array(
            'title' => 'required',
            'author' => 'required',
            'publishTime' => 'required',
            'cover' => 'required',
        );
        $message = array(
            "required" => ":attribute 不能为空",
        );

        $attributes = array(
            "title" => '题目',
            'author' => '作者',
            'publishTime' => '发布时间',
            'cover' => '封面',
        );

        $this->validator = Validator::make(
            Input::all(),
            $rules,
            $message,
            $attributes
        );
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return response()->view('article.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        if ($this->validator->fails()) {
            return redirect()->back()->withErrors($this->validator->errors());
        }
        return response()->view('article.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show()
    {
        return response()->view('article.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
