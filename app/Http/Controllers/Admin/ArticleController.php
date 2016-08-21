<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Category;
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
        $category = new Category;
        $tmp = array();
        $tmp = $category->tree();
        $data = $tmp;
        return view('admin/article/add', compact('data'));
    }

}
