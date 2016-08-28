<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>泳乎</title>
    <meta name="keywords" content="拿来用的模板" />
    <meta name="description" content="拿来用的东西" />
    <link href="{{ asset('home/css/base.css') }}" rel="stylesheet">
    <link href="{{ asset('home/css/index.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/style/css/admin.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/style/font/css/font-awesome.min.css') }}" type="text/css">
<!--[if lt IE 9]>
<script src="{{ asset('home/js/modernizr.js') }}"></script>
<![endif]-->
</head>
<body>
<header>
  <nav class="topnav" id="topnav"><a href="index.blade.php"><span class="en">Protal</span></a><a href="about.html"><span>泳乎</span><span class="en">About</span></a><a href="newlist.html"><span>Test</span><span class="en">Life</span></a><a href="moodlist.html"><span>Test</span><span class="en">Doing</span></a><a href="share.html"><span>Test</span><span class="en">Share</span></a><a href="knowledge.html"><span>Test</span><span class="en">Learn</span></a><a href="book.html"><span>Test</span><span class="en">Gustbook</span></a></nav>
  </nav>
</header>

<article>
  <h2 class="title_tj">
    <p>文章<span>推荐</span></p>
  </h2>
    @foreach($article as $data => $tmp)
  <div class="bloglist left">
    <h3>{{ $tmp->article_title }}</h3>
    <ul>
      <p>{!! $tmp->article_content !!}</p>
      <a title="/" href="/" target="_blank" class="readmore">阅读全文>></a>
    </ul>
    <p class="dateview"><span>2016-08-28</span><span>{{ $tmp->article_editor }}</span><span>泳乎：[<a href="/news/life/">程序人生</a>]</span></p>
  </div>
    @endforeach
</article>
<div class="page_list">
    {{ $article->render() }}
</div>


<script src="{{ asset('home/js/silder.js') }}"></script>
</body>
</html>
