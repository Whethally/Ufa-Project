@extends('layouts.base')

@include('includes.header')
@include('includes.footer')

@section('content')
	<x-content>
		<x-content-title link="{{ __('Уже есть аккаунт?') }}" href="{{ route('login') }}">{{ __('Регистрация') }}
		</x-content-title>
		<x-auth.form action="{{ route('register.store') }}" method="POST">
			<x-auth.form-block>
				<x-auth.form-password>
					<x-auth.form-item>
						<x-auth.label for="firstName" required>{{ __('Фамилия') }}</x-auth.label>
						<x-auth.input type="text" name="firstName" id="firstName" value="{{ old('firstName') }}" required />
						{{-- <x-form-error for="firstName" /> --}}
					</x-auth.form-item>
					<x-auth.form-item>
						<x-auth.label for="lastName" required>{{ __('Имя') }}</x-auth.label>
						<x-auth.input type="text" name="lastName" id="lastName" value="{{ old('lastName') }}" required />
						{{-- <x-form-error for="lastName" /> --}}
					</x-auth.form-item>
					<x-auth.form-item>
						<x-auth.label for="patronymic" required>{{ __('Отчество') }}</x-auth.label>
						<x-auth.input type="text" name="patronymic" id="patronymic" value="{{ old('patronymic') }}" required />
						{{-- <x-form-error for="patronymic" /> --}}
					</x-auth.form-item>
				</x-auth.form-password>
				<x-auth.form-item>
					<x-auth.label for="email" required>{{ __('E-mail') }}</x-auth.label>
					<x-auth.input type="email" name="email" id="email" value="{{ old('email') }}" required />
					{{-- <x-form-error for="email" /> --}}
				</x-auth.form-item>
				<x-auth.form-item>
					<x-auth.label for="login" required>{{ __('Логин') }}</x-auth.label>
					<x-auth.input type="text" name="login" id="login" value="{{ old('login') }}" required />
					{{-- <x-form-error for="email" /> --}}
				</x-auth.form-item>
				<x-auth.form-password>
					<x-auth.form-item>
						<x-auth.label for="password" required>{{ __('Пароль') }}</x-auth.label>
						<x-auth.input type="password" name="password" id="password" required />
						{{-- <x-form-error for="password" /> --}}
					</x-auth.form-item>
					<x-auth.form-item>
						<x-auth.label for="password_confirmation" required>{{ __('Подтверждение пароля') }}</x-auth.label>
						<x-auth.input type="password" name="password_confirmation" id="password_confirmation" required />
						{{-- <x-form-error for="password_confirmation" /> --}}
					</x-auth.form-item>
				</x-auth.form-password>
				<x-auth.form-item>
					<x-auth.checkbox name="agreement" required>
						{{ __('Я согласен на обработку персональных данных') }}
					</x-auth.checkbox>
				</x-auth.form-item>
				@if ($errors->any())
					<x-auth.form-item>
						{{ __('Заполнены не все поля.') }}
					</x-auth.form-item>
				@endif
				<x-auth.form-item>
					<x-auth.button type="submit">{{ __('Зарегистрироваться') }}</x-auth.button>
				</x-auth.form-item>
			</x-auth.form-block>
		</x-auth.form>
	</x-content>
@endsection
