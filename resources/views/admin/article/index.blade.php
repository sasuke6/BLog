@extends('layouts/admin')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <i class="fa fa-home"></i> <a href="{{ url('admin/info') }}}">首页</a> &raquo;  文章管理
    </div>
    <!--面包屑导航 结束-->

    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
        <div class="result_wrap">
            <!--快捷导航 开始-->
            <div class="result_title">
                <h3>文章列表</h3>
            </div>

            <div class="result_content">
                <div class="short_wrap">
                    <a href=" {{ url('admin/article/create') }}"><i class="fa fa-plus"></i>添加文章</a>
                    <a href=" {{ url('admin/article') }}"><i class="fa fa-recycle"></i>全部文章</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

            <div class="result_wrap">
                <div class="result_content">
                    <table class="list_tab">
                        <tr>
                            <th class="tc">ID</th>
                            <th>标题</th>
                            <th>点击</th>
                            <th>发布人</th>
                            <th>更新时间</th>
                            <th>操作</th>
                        </tr>
                        @foreach($data as $tmp)
                        <tr>
                            <td class="tc"> {{ $tmp->article_id }}</td>
                            <td>
                                <a href="#">{{ $tmp->article_title }}</a>
                            </td>
                            <td>{{ $tmp->article_view }}</td>
                            <td>{{ $tmp->article_editor }}</td>
                            <td>{{ date('Y-m-d', $tmp->article_time) }}</td>
                            <td>
                                <a href=" {{ url('admin/article/' .$tmp->article_id. '/edit') }}">修改</a>
                                <a href="javascript:;" onclick="deleteArticle( {{$tmp->article_id}} )">删除</a>
                            </td>
                        </tr>
                            @endforeach
                    </table>

                    <div class="page_list">
                        {{ $data->render() }}
                    </div>
                </div>
            </div>
    </form>


<style>
    .result_content ul li span {
        font-size: 15px;
        padding: 6px 12px;
    }
</style>

    <script>
        function deleteArticle(article_id) {
            layer.confirm('你确定要删除这篇文章吗?', {
                btn: ['确定', '取消']
            }, function () {
                $.post("{{ url('admin/article/') }}/" + article_id , { '_method': 'delete', '_token': '{{ csrf_token() }}' }, function (data) {
                    if (data.status == 0) {
                        location.href = location.href;
                        layer.msg(data.message, {icon : 6});
                    } else {
                        layer.msg(data.message, {icon : 5});
                    }
                });
            }, function () {

            });
        }

    </script>



    <!--搜索结果页面 列表 结束-->
@endsection