@section('header')
	<div class="logo">
		<img width="64" src="{{ asset('img/logo.png') }}" alt="logo">
		<ul>
			<li><a href="{{ route('application.index') }}">{{ __('Главная') }}</a></li>
			{{-- <li><a href="#">{{ __('О проекте') }}</a></li>
			<li><a href="#">{{ __('Контакты') }}</a></li> --}}
		</ul>
	</div>
	<div class="menu">
		@guest
			<ul>
				<li><a href="{{ route('login') }}">{{ __('Войти') }}</a></li>
				<li><a class="button" href="{{ route('register') }}">{{ __('Регистрация') }}</a></li>
			</ul>
		@endguest
		@auth
			<ul>
				<li><a href="{{ route('profile.index') }}">{{ __('Профиль') }}</a></li>
				@if (Auth::user()->admin == '1')
					<li><a href="{{ route('dashboard.index') }}">{{ __('Админка') }}</a></li>
				@endif
				<li><a href="{{ route('logout') }}">{{ __('Выйти') }}</a></li>
			</ul>
		@endauth
	</div>
@endsection
