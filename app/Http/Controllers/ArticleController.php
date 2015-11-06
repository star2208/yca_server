<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Faker\Provider\DateTime;
use App\Topic;
use App\Author;
use App\Article;
use Carbon\Carbon;

class ArticleController extends Controller
{
    private $validator;
    public function __construct()
    {
        $this->middleware('auth');
        $rules = array(
            'title' => 'required',
            'author' => 'required',
            'publishTime' => 'required',
            'cover' => 'required',
            'topic' => 'required',
        );
        $message = array(
            "required" => ":attribute 不能为空",
        );

        $attributes = array(
            "title" => '题目',
            'author' => '作者',
            'publishTime' => '发布时间',
            'cover' => '封面',
            'topic' => '栏目',
        );

        $this->validator = Validator::make(
            Input::all(),
            $rules,
            $message,
            $attributes
        );
    }

    public function index()
    {
        $articles = Article::paginate(20);
        return response()->view('article.index',['articles' => $articles,'nowtime' => Carbon::now()]);
    }

    public function create(Request $request)
    {
        if ($this->validator->fails()) {
            return redirect()->back()->withErrors($this->validator->errors());
        }
        $topic = Topic::find($request->input("topic"));
        $author = Author::find($request->input("author"));
        $article = new Article();
        $article -> title = $request->input("title");
        $article -> cover = $request->input("cover");
        $article -> author() -> associate($author);
        $article -> topic() -> associate($topic);
        $article -> publishTime = Carbon::createFromFormat('Y-m-d H:i', trim($request->input("publishTime")));
        $article->save();
        return redirect()->action('ArticleController@index');
    }


    public function store(Request $request)
    {
        //
    }


    public function show()
    {
        $topics = Topic::all();
        $authors = Author::all();
        return response()->view('article.create',['topics' => $topics,'authors' => $authors]);
    }


    public function edit_main($id)
    {
        //
    }

    public function edit_content($id)
    {
        $article = Article::find($id);
        return response()->view('article.editcontent',['article' => $article]);
    }

    public function update_main(Request $request, $id)
    {
        //
    }

    public function update_content(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }

    public function delete($id)
    {
        return response()->json($id);
    }
    public function content_add_big(Request $request)
    {
        return response()->json($request->input("big_title"));
    }
    public function content_add_small(Request $request)
    {
        return response()->json($request->input("small_title"));
    }
    public function content_add_text(Request $request)
    {
        return response()->json($request->input("text"));
    }
    public function content_add_pic(Request $request)
    {
        return response()->json($request->input("pic_id"));
    }
}
