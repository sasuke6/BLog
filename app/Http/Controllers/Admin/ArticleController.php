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
        $data = Article::orderBy('article_id', 'desc')->paginate(10);
        return view('admin/article/index', compact('data'));
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

    public function edit($article_id)
    {
        $tmp = new Category;
        $data = $tmp->tree();
        $field = Article::find($article_id);

        return view('admin/article/edit', compact('data' , 'field'));

    }

    public function update($article_id)
    {
        $input = Input::except('_token', '_method');
        $tmp = Article::where('article_id', $article_id)->update($input);
        if ($tmp) {
            return redirect('admin/article');
        } else {
            return back()->with('errors', '文章更新失败,请稍后重试!');
        }


    }

    public function destroy($article_id)
    {
        $tmp = Article::where('article_id', $article_id)->delete();
        if ($tmp) {
            $data = [
                'status' => 0,
                'message' => '文章删除成功',
            ];
        } else {
            $data = [
                'status' => 1,
                'message' => '文章删除失败,请稍后重试',
            ];
        }

        return $data;
    }

}















