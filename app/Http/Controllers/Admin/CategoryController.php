<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $category = new Category;
        $tmp = array();
        $tmp = $category->tree();
        return view('admin/category/index')->with('data',$tmp);

    }

    public function create()
    {
        $data = Category::where('cate_pid',0)->get();
        return view('admin/category/add' , compact('data'));

    }

    public function store()
    {
        $input = Input::except('_token');
        $rules = [
            'cate_name' => 'required',
        ];

        $message = [
            'cate_name.required' => '分类名称不能为空!',
        ];


        $validator = Validator::make($input, $rules, $message);

        if ($validator->passes()) {
            $tmp = Category::create($input);
            if ($tmp) {
                return redirect('admin/category');
            } else {
                return back()->with('errors', '数据填充失败,请重试');
            }
        } else {
            return back()->withErrors($validator);
        }


    }

    // admin/category/{category}/edit
    public function edit($cate_id)
    {
        $field = Category::find($cate_id);
        $data = Category::where('cate_pid',0)->get();
        return view('admin/category/edit', compact('field', 'data'));

    }

    // put admin/category/{category}
    public function update($cate_id)
    {
        $input = Input::except('_token', '_method');
        $tmp = Category::where('cate_id', $cate_id)->update($input);
        if ($tmp) {
            return redirect('admin/category');
        } else {
            return back()->with('errors', '分类信息更新失败,请稍后重试');
        }
    }

    public function show()
    {

    }


    public function destroy($cate_id)
    {
        $tmp = Category::where('cate_id', $cate_id)->delete();
        Category::where('cate_pid', $cate_id)->update(['cate_pid' => 0]);
        if ($tmp) {
            $data = [
                'status' => 0,
                'message' => '分类删除成功',
            ];
        } else {
            $data = [
                'status' => 1,
                'message' => '分类删除失败,请稍后重试',
            ];
        }

        return $data;
    }

    public  function  changeOrder()
    {
        $input = Input::all();
        $cate = Category::find($input['cate_id']);
        $cate->cate_order = $input['cate_order'];
        $src = $cate->update();

        if ($src){
            $data = [
                'status' => 0,
                'message' => '分类排序更新成功',
            ];
        } else {
            $data = [
                'status' => 1,
                'message' => '分类排序更新失败,请稍后重试!',
            ];
        }
        return $data;

    }



}
