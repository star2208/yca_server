<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Topic;

class TopicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $topics = Topic::all();
        return response()->view('topic.index',['topics' => $topics]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
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
        $topic = Topic::find($request->input("id"));
        $topic -> name = $request->input("name");
        $topic -> color = base_convert (substr($request->input("color"),-6), 16,10 ) ;
        $topic -> describe = $request->input("describe");
        $topic -> save();
        return  redirect()->action('TopicController@index');;
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
