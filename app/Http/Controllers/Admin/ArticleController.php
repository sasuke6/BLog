<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Article;
use App\Http\Model\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

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

    public function store()
    {
        $input = Input::except('_token');
        $input['article_time'] = time();

        $rules = [
            'article_title' => 'required',
            'article_content' => 'required',
        ];

        $message = [
            'article_title.required' => '文章名称不能为空',
            'article_content.required' => '文章内容不能为空',
        ];


        $validator = Validator::make($input, $rules, $message);


        if ($validator->passes()) {
            $tmp = Article::create($input);
            if ($tmp) {

                return redirect('admin/article');

            } else {

                return back()->with('errors', '数据填充失败,请稍后重试');
            }
        } else {
            return back()->withErrors($validator);
        }
    }

}
