@extends('layouts/admin')
@section('content')
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{ url('admin/info') }}">首页</a> &raquo; 添加文章
    </div>
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>文章管理</h3>
            @if(count($errors)>0)
                <div class="mark">
                    @if(is_object($errors))
                        @foreach($errors->all() as $error)
                            <p>{{  $error }}</p>
                        @endforeach
                    @else
                        <p>{{ $errors }}</p>
                    @endif
                </div>
            @endif
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href=" {{ url('admin/article/create') }}"><i class="fa fa-plus"></i>添加文章</a>
                <a href="{{ url('admin/article') }}"><i class="fa fa-recycle"></i>全部文章</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        <form action=" {{ url('admin/article/'.$field->article_id) }}" method="post">
            <input type="hidden" name="_method" value="put">
            {{ csrf_field() }}
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th width="120">分类：</th>
                        <td>
                            <select name="cate_id">
                                @foreach($data as $tmp )
                                <option value="{{ $tmp->cate_id }}"
                                        @if($field->cate_id == $tmp->cate_id) selected @endif
                                >{{ $tmp->_cate_name }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>文章标题：</th>
                        <td>
                            <input type="text" class="lg" name="article_title" value="{{ $field->article_title }}">
                        </td>
                    </tr>
                    <tr>
                        <th>编辑：</th>
                        <td>
                            <input type="text"  class="sm" name="article_editor" value="{{ $field->article_editor }}">
                        </td>
                    </tr>
                    <tr>
                        <th>关键词：</th>
                        <td>
                            <input type="text" class="lg" name="article_tag" value="{{ $field->article_tag }}">
                        </td>
                    </tr>
                    <tr>
                        <th>描述：</th>
                        <td>
                            <textarea name="article_description">{{ $field->article_description }}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>文章内容：</th>
                        <td>
                            <script type="text/javascript" charset="utf-8" src="{{ asset('admin/style/ueditor/ueditor.config.js') }}"></script>
                            <script type="text/javascript" charset="utf-8" src="{{ asset('admin/style/ueditor/ueditor.all.min.js') }}"> </script>
                            <script type="text/javascript" charset="utf-8" src="{{ asset('admin/style/ueditor/lang/zh-cn/zh-cn.js') }}"></script>
                            <script id="editor" name="article_content" type="text/plain" style="width:1024px;height:500px;">{!! $field->article_content !!}</script>

                            <script type="text/javascript">
                                var ue = UE.getEditor('editor');
                            </script>

                            <style>
                                .edui-default{line-height: 28px;}
                                div.edui-combox-body,div.edui-button-body,div.edui-splitbutton-body
                                {overflow: hidden; height:20px;}
                                div.edui-box{overflow: hidden; height:22px;}
                            </style>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <input type="submit" value="提交">
                            <input type="button" class="back" onclick="history.go(-1)" value="返回">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
@endsection