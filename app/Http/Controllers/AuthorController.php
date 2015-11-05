<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Author;
class AuthorController extends Controller
{
    private $validator;
    public function __construct()
    {
        $this->middleware('auth');
        $rules = array(
            'author_name' => 'required',
            'author_describe' => 'required',
            'headimage' => 'required',
        );
        $message = array(
            "required"             => ":attribute 不能为空",
            "between"      => ":attribute 长度必须在 :min 和 :max 之间"
        );

        $attributes = array(
            "author_name" => '姓名',
            'author_describe' => '作者简介',
            'headimage' => '作者头像',
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
        $authors = Author::all();
        return response()->view('author.index',['authors' => $authors]);
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
        $author = new Author();
        $author -> name = $request->input("author_name");
        $author -> headImage = $request->input("headimage");
        $author -> describe = $request->input("author_describe");
        $author -> save();
        return  redirect()->action('AuthorController@index');
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
        return response()->view('author.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $author = Author::findOrNew($id);
        return  response()->view('author.edit',['author' => $author]);
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
        $author = Author::find($request->input("id"));
        $author -> name = $request->input("name");
        $author -> headImage = $request->input("headimage");
        $author -> describe = $request->input("describe");
        $author -> save();
        return  redirect()->action('AuthorController@index');
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
