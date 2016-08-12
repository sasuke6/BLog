<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	{{--<link rel="stylesheet" href="/resources/views/admin/style/css/admin.css">--}}
	<link rel="stylesheet" href="{{ asset('admin/style/css/admin.css') }}" type="text/css">
	<link rel="stylesheet" href="{{ asset('admin/style/font/css/font-awesome.min.css') }}" type="text/css">
</head>
<body style="background:#F3F3F4;">
	<div class="login_box">
		<h1>泳乎</h1>
		<h2>欢迎使用泳乎后端管理平台</h2>
		<div class="form">

            @if(session('message'))
                <p style="color:red">{{ session('message') }}</p>
            @endif

			<form action="" method="post">
                {{ csrf_field() }}
				<ul>
					<li>
					<input type="text" name="username" class="text"/>
						<span><i class="fa fa-user"></i></span>
					</li>
					<li>
						<input type="password" name="password" class="text"/>
						<span><i class="fa fa-lock"></i></span>
					</li>
					<li>
						<input type="text" class="code" name="code"/>
						<span><i class="fa fa-check-square-o"></i></span>
						<img src="{{ url('captcha') }}" alt="" onclick="this.src='{{url('captcha')}}?' + Math.random()">
					</li>
					<li>
						<input type="submit" value="立即登陆"/>
					</li>
				</ul>
			</form>
		</div>
	</div>
</body>
</html>