<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Topic;

class TopicController extends Controller
{
    private $validator;
    public function __construct()
    {
        $this->middleware('auth');
        $rules = array(
            'name' => 'required',
            'describe' => 'required',
            'color' => 'required',
        );
        $message = array(
            "required"             => ":attribute 不能为空",
            "between"      => ":attribute 长度必须在 :min 和 :max 之间"
        );

        $attributes = array(
            "name" => '栏目名称',
            'describe' => '栏目简介',
            'color' => '栏目背景颜色',
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
        $topics = Topic::orderBy('id')->get();
        return response()->view('topic.index',['topics' => $topics]);
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
        $topic = new Topic();
        $topic -> name = $request->input("name");
        $topic -> color = base_convert (substr($request->input("color"),-6), 16,10 ) ;
        $topic -> describe = $request->input("describe");
        $topic -> save();
        return redirect()->action('TopicController@index');
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
        return response()->view('topic.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $topic = Topic::findOrNew($id);
        $topic -> color = '#'.base_convert ($topic->color,10,16 );
        #echo $topic -> color;
        return  response()->view('topic.edit',['topic' => $topic]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request)
    {
        if ($this->validator->fails()) {
            return redirect()->back()->withErrors($this->validator->errors());
        }
        $topic = Topic::find($request->input("id"));
        $topic -> name = $request->input("name");
        $topic -> color = base_convert (substr($request->input("color"),-6), 16,10 ) ;
        $topic -> describe = $request->input("describe");
        $topic -> save();
        return  redirect()->action('TopicController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function delete($id)
    {
        $topic = Topic::find($id);
        $topic->delete();
        return  redirect()->action('TopicController@index');
    }
}
