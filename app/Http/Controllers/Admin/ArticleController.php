<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    //
    public function index()
    {
        echo '测试';
    }

    public function create()
    {
        $data = [];
        return view('admin/article/add', compact('data'));
    }

}
