@extends('layouts.base')

@include('includes.header')
@include('includes.footer')

@section('content')
	<x-content>
		<x-content-title link="{{ __('Назад') }}" href="{{ URL::previous() }}">
			{{ __('Добавить категорию') ?? $application->title }}
		</x-content-title>
		<x-auth.form action="{{ route('dashboard.store') }}" method="post">
			@csrf
			<x-auth.form-block>
				<x-auth.form-item>
					<x-auth.label for="name" required>{{ __('Название') }}</x-auth.label>
					<x-auth.input type="text" name="name" id="name" value="{{ old('name') }}" required />
				</x-auth.form-item>
				<x-auth.form-item>
					<x-auth.button type="submit">{{ __('Добавить') }}</x-auth.button>
				</x-auth.form-item>
			</x-auth.form-block>
		</x-auth.form>
	</x-content>
@endsection
