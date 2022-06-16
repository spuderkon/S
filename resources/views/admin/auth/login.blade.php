<!DOCTYPE html>
<html lang="en">

<head>
	<title>Вход</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Sublime project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{csrf_token()}}">
	<link rel="stylesheet" type="text/css" href="/styles/bootstrap4/bootstrap.min.css">
	<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="/styles/contact.css">
	<link rel="stylesheet" type="text/css" href="/styles/contact_responsive.css">
</head>

<body>

	<div class="super_container">


		<h1 style="text-align:center;">Вход</h1>
		<form class="col-4 offset-4 border rounded" method="POST" action="{{ route('admin.login_process')}}">
			@csrf
			<div class="form-group">
				<label for="login" class="col-form-label-lg">Ваш логин</label>
				<input class="form-control" id="login" name="login" type="text" value="" placeholder="Логин">
				@error('login')
				<div class="alert alert-danger">{{$message}}</div>
				@enderror
			</div>
			<div class="form-group">
				<label for="password" class="col-form-label-lg">Пароль</label>
				<input class="form-control" id="password" name="password" type="password" value="" placeholder="Пароль">
				@error('password')
				<div class="alert alert-danger">{{$message}}</div>
				@enderror
			</div>
			<div class="form-group" style="text-align: center;">
				<button class="btn btn-lg btn-primary" type="submit" name="sendMe" value="1">Войти</button>
			</div>
		</form>

	</div>


	<script src="/js/jquery-3.2.1.min.js" type="text/javascript"></script>
	<script src="/js/jquery.maskedinput.min.js" type="text/javascript"></script>
	<script src="/styles/bootstrap4/popper.js"></script>
	<script src="/styles/bootstrap4/bootstrap.min.js"></script>
	<script src="/plugins/greensock/TweenMax.min.js"></script>
	<script src="/plugins/greensock/TimelineMax.min.js"></script>
	<script src="/plugins/scrollmagic/ScrollMagic.min.js"></script>
	<script src="/plugins/greensock/animation.gsap.min.js"></script>
	<script src="/plugins/greensock/ScrollToPlugin.min.js"></script>
	<script src="/plugins/easing/easing.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
	<script src="/js/contact.js"></script>
	<script>
		$(document).ready(function() {
			$("#Phone").mask("8(999)-999-99-99");
		});
	</script>
</body>

</html>