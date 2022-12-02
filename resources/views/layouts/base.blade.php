<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="{{ asset('css/main.css') }}">
	<title>{{ __('Уфа - Сделаем лучше вместе!') }}</title>
</head>

<body>
	<div class="container">
		<div class="wrapper">
			<header class="header">
				@yield('header')
			</header>
			<main class="main">
				@yield('content')
			</main>
			<footer class="footer">
				@yield('footer')
			</footer>
		</div>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
		integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
		crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
