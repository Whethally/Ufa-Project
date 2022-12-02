@extends('layouts.base')

@include('includes.header')
@include('includes.footer')

@section('content')
	<x-content>
		<x-content-title link="{{ __('Нет аккаунта?') }}" href="{{ route('register') }}">{{ __('Авторизация') }}
		</x-content-title>
		<x-auth.form action="{{ route('login.store') }}" method="POST">
			<x-auth.form-block>
				<x-auth.form-item>
					<x-auth.label for="login">{{ __('Логин') }}</x-auth.label>
					<x-auth.input type="text" name="login" id="login" value="{{ old('login') }}" required />
					{{-- <x-form-error for="email" /> --}}
				</x-auth.form-item>
				<x-auth.form-item>
					<x-auth.label for="password">{{ __('Пароль') }}</x-auth.label>
					<x-auth.input type="password" name="password" id="password" required />
					{{-- <x-form-error for="password" /> --}}
				</x-auth.form-item>
				@if ($errors->any())
					<x-auth.form-item>
						{{ __('Неверный логин или пароль') }}
					</x-auth.form-item>
				@endif
				<x-auth.form-item>
					<x-auth.button type="submit">{{ __('Войти') }}</x-auth.button>
				</x-auth.form-item>
			</x-auth.form-block>
		</x-auth.form>
	</x-content>
@endsection
