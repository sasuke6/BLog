<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

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

    }

    public function show()
    {

    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

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
