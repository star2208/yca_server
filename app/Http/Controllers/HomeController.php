<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Notification;
use App\HomePage;
use Carbon\Carbon;
use App\Article;

class HomeController extends Controller
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
        $start = (new Carbon('now'))->hour(0)->minute(0)->second(0);
        $end = (new Carbon('now'))->hour(23)->minute(59)->second(59);
        $notification_count = Notification::whereBetween('sendTime',[$start , $end])->count();
        $homepage_count = HomePage::whereBetween('created_at',[$start , $end])->count();
        $today_article_count = Article::whereBetween('publishTime',[$start , $end])->count();
        $article_count = Article::all()->count();
        return view("home",['notification_count' => $notification_count ,'homepage_count' => $homepage_count,'today_article_count' => $today_article_count,'article_count' => $article_count]);
    }
}
