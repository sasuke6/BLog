<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Article;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //

    public function index()
    {
        $article = Article::orderBy('article_id', 'desc')->paginate(8);
        return view('home/index', compact('article'));
    }

    public function article($article_id)
    {
          //test
    }
}
