@extends('layouts.base')

@include('includes.header')
@include('includes.footer')

@section('content')
	<x-content>
		<x-content-title link="{{ __('Назад') }}" href="{{ URL::previous() }}">{{ __('Создать заявку') }}
		</x-content-title>
		<x-auth.form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
			<x-auth.form-block>
				<x-auth.form-item>
					<x-auth.label for="title" required>{{ __('Название') }}</x-auth.label>
					<x-auth.input type="text" name="title" id="title" value="{{ old('title') }}" required />
					{{-- <x-form-error for="email" /> --}}
				</x-auth.form-item>
				<x-auth.form-item>
					<x-auth.label for="description" required>{{ __('Описание') }}</x-auth.label>
					<x-auth.input type="text" name="description" id="description" value="{{ old('description') }}" required />
					{{-- <x-form-error for="password" /> --}}
				</x-auth.form-item>
				<x-auth.form-item>
					<select class="form-control" name="category" id="category" required>
						{{-- option non clickable --}}
						<option value="" disabled selected>{{ __('Выберите категорию') }}</option>
						@foreach ($categories as $category)
							<option value="{{ $category->id }}">{{ $category->name }}</option>
						@endforeach
					</select>
					{{-- <x-form-error for="password" /> --}}
				</x-auth.form-item>
				{{-- <x-auth.form-item>
					<select name="status" id="status" class="form-control">
						<option value="">{{ __('Все') }}</option>
						@foreach ($statuses as $status)
							<option value="{{ $status->id }}" @if ($status->id == 1) selected @endif>{{ $status->name }}
							</option>
						@endforeach
					</select>
				</x-auth.form-item> --}}
				<x-auth.form-item>
					{{-- <label class="form-control" for="image">{{ __('Загрузите изображение') }}</label> --}}
					<x-auth.input name="image" id="image" type="file" value="" />
				</x-auth.form-item>
				@if ($errors->any())
					@foreach ($errors->all() as $error)
						{{ $error }}
					@endforeach
				@endif
				<x-auth.form-item>
					<x-auth.button type="submit">{{ __('Создать') }}</x-auth.button>
				</x-auth.form-item>
			</x-auth.form-block>
		</x-auth.form>
	</x-content>
@endsection
