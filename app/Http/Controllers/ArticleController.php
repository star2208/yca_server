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
use Auth;
use App\HomePage;

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
            'describe' => 'required',
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
            'describe' => '简介',
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
        $articles = Article::orderBy('publishTime','desc')->paginate(20);
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
        $article -> describe = $request->input("describe");
        $article -> style = $request->input("style");
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
        $article = Article::find($id);
        $topics = Topic::all();
        $authors = Author::all();
        return response()->view('article.editmain',['article' => $article,'topics' => $topics,'authors' => $authors]);
    }

    public function edit_content($id)
    {
        $article = Article::find($id);
        $user = Auth::user();
        return response()->view('article.editcontent',['article' => $article,'user'=>$user]);
    }

    public function update(Request $request)
    {
        if ($this->validator->fails()) {
            return redirect()->back()->withErrors($this->validator->errors());
        }
        $topic = Topic::find($request->input("topic"));
        $author = Author::find($request->input("author"));
        $article = Article::find($request->input("id"));
        $article -> title = $request->input("title");
        $article -> cover = $request->input("cover");
        $article -> describe = $request->input("describe");
        $article -> style = $request->input("style");
        $article -> author() -> associate($author);
        $article -> topic() -> associate($topic);
        $article -> publishTime = Carbon::createFromFormat('Y-m-d H:i', trim($request->input("publishTime")));
        $article->save();
        return redirect()->action('ArticleController@index');
    }

    public function add_homepage($id)
    {
        $article = Article::find($id);
        $article->is_homepage = true;
        $article->save();
        return  redirect()->action('ArticleController@index');
    }
    public function remove_homepage($id)
    {
        $article = Article::find($id);
        $article->is_homepage = false;
        $article->save();
        return  redirect()->action('ArticleController@index');
    }
    public function add_headlines($id)
    {
        $article = Article::find($id);
        $article->is_headlines = true;
        $article->save();
        return  redirect()->action('ArticleController@index');
    }
    public function remove_headlines($id)
    {
        $article = Article::find($id);
        $article->is_headlines = false;
        $article->save();
        return  redirect()->action('ArticleController@index');
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();
        return  redirect()->action('ArticleController@index');
    }

    public function delete($id)
    {
        $article = Article::find($id);
        $date = $article -> content;
        array_pop($date['content']);
        $article -> content = $date;
        $article -> save();
        return response()->json($date);
    }
    public function content_add_big(Request $request)
    {
        $id = $request->input("id");
        $big_title = $request->input("big_title");
        $article = Article::find($id);
        $date = $article -> content;
        if (!is_null($big_title)&&$big_title!="") {
            $new_content = [
                'type' => 0 ,
                'text' => $big_title ,
            ];
            array_push($date['content'],$new_content);
            $article -> content = $date;
            $article -> accepted = false;
            $article->save();
        }
        return response()->json($date);
    }
    public function content_add_small(Request $request)
    {
        $id = $request->input("id");
        $small_title = $request->input("small_title");
        $article = Article::find($id);
        $date = $article->content;
        if (!is_null($small_title)&&$small_title!="") {
            $new_content = [
                'type' => 1,
                'text' => $small_title,
            ];
            array_push($date['content'], $new_content);
            $article->content = $date;
            $article -> accepted = false;
            $article->save();
        }
        return response()->json($date);
    }
    public function content_add_text(Request $request)
    {
        $id = $request->input("id");
        $text = $request->input("text");
        $article = Article::find($id);
        $date = $article -> content;
        if (!is_null($text)&&$text!="") {
            $new_content = [
                'type' => 2 ,
                'text' => $text ,
            ];
            array_push($date['content'],$new_content);
            $article -> content = $date;
            $article -> accepted = false;
            $article->save();
        }
        return response()->json($date);
    }
    public function content_add_pic(Request $request)
    {
        $id = $request->input("id");
        $pic_id = $request->input("pic_id");
        $article = Article::find($id);
        $date = $article -> content;
        if (!is_null($pic_id)&&$pic_id!="") {
            $new_content = [
                'type' => 3 ,
                'img' => $pic_id ,
            ];
            array_push($date['content'],$new_content);
            $article -> content = $date;
            $article -> accepted = false;
            $article->save();
        }
        return response()->json($date);
    }
    public function content_add_link(Request $request)
    {
        $id = $request->input("id");
        $link_url = $request->input("link_url");
        $link_text = $request->input("link_text");
        $article = Article::find($id);
        $date = $article -> content;
        if (!is_null($link_url)&&$link_url!=""&&!is_null($link_text)&&$link_text!="") {
            $new_content = [
                'type' => 4 ,
                'link_url' => $link_url ,
                'link_text' => $link_text ,
            ];
            array_push($date['content'],$new_content);
            $article -> content = $date;
            $article -> accepted = false;
            $article->save();
        }
        return response()->json($date);
    }

    public function accept(Request $request)
    {
        $id = $request->input("id");
        $article = Article::find($id);
        $date = $article -> content;
        $article -> accepted = true;
        $article->save();
        return response()->json($date);
    }

    public function cancel_accept(Request $request)
    {
        $id = $request->input("id");
        $article = Article::find($id);
        $date = $article -> content;
        $article -> accepted = false;
        $article->save();
        return response()->json($date);
    }
}
