@extends('layouts.base')

@include('includes.header')
@include('includes.footer')

@section('content')
	<x-content>
		<x-content-title link="{{ __('Назад') }}" href="{{ URL::previous() }}">
			{{ __('Изменить пост') ?? $application->title }}
		</x-content-title>
		<div class="user-edit-items">
			<x-content-body>
				<x-content-image>
					<x-content-img before="{{ $application->image_before }}" after="{{ $application->image_after }}"
						src="{{ $application->image_after }}" alt="image" />
				</x-content-image>
				<x-content-info>
					<x-content-text>
						<x-content-text-block>
							<x-content-text-title>{{ $application->title }}</x-content-text-title>
						</x-content-text-block>
						<x-content-text-block>
							{{ $application->description }}
						</x-content-text-block>
						<x-content-text-block>
							<x-content-text-category>{{ $application->category->name }}</x-content-text-category>
						</x-content-text-block>
						<x-content-text-block>
							<x-content-text-date>{{ $application->created_at->diffForhumans() }}</x-content-text-date>
						</x-content-text-block>
						<x-content-text-block>
							{{ $application->status_name }}
						</x-content-text-block>
					</x-content-text>
				</x-content-info>
			</x-content-body>
			<x-auth.form action="{{ route('dashboard.update', $application->id) }}" method="post" enctype="multipart/form-data">
				@method('PUT')
				<x-auth.form-block>
					<x-auth.form-item>
						<x-auth.label for="title" required>{{ __('Название') }}</x-auth.label>
						<x-auth.input type="text" name="title" id="title" value="{{ $application->title }}" required />
						{{-- <x-form-error for="email" /> --}}
					</x-auth.form-item>
					<x-auth.form-item>
						<x-auth.label for="description" required>{{ __('Описание') }}</x-auth.label>
						<x-auth.input type="text" name="description" id="description" value="{{ $application->description }}"
							required />
						{{-- <x-form-error for="password" /> --}}
					</x-auth.form-item>
					<x-auth.form-item>
						<select class="form-control" name="category" id="category" required>
							{{-- option non clickable --}}
							<option value="" disabled selected>{{ __('Выберите категорию') }}</option>
							@foreach ($categories as $category)
								<option value="{{ $category->id }}" @if ($category->id == $application->category_id) selected @endif>
									{{ $category->name }}
								</option>{{ $category->name }}</option>
							@endforeach
						</select>
						{{-- <x-form-error for="password" /> --}}
					</x-auth.form-item>
					<x-auth.form-item>
						<select name="status" id="status" class="form-control">
							<option value="" disabled>{{ __('Все') }}</option>
							@foreach ($statuses as $status)
								<option value="{{ $status->id }}" @if ($status->id == $application->status_id) selected @endif
									@if ($application->status_id == 3 || $application->status_id == 4) disabled @endif>{{ $status->name }}
								</option>
							@endforeach
						</select>
					</x-auth.form-item>
					<x-auth.form-item id="reason">
						<x-auth.label for="reason">{{ __('Причина ( в случае отказа) ') }}</x-auth.label>
						<input class="form-control" @if ($application->status_id == 4) readonly="readonly" @endif type="text"
							name="reason" id="reason" value="{{ $application->reason }}" />
						{{-- <x-form-error for="password" /> --}}
					</x-auth.form-item>
					<x-auth.form-item>
						<label class="form-control" for="image">{{ __('Загрузить изображение (после)') }}</label>
						<input name="image" id="image" type="file" class="hidden" value="{{ $application->image_before }}" />
					</x-auth.form-item>
					<x-auth.form-item>
						<x-auth.button type="submit">{{ __('Изменить') }}</x-auth.button>
					</x-auth.form-item>
				</x-auth.form-block>
			</x-auth.form>
		</div>

	</x-content>
	{{-- <script>
		// if option selected status_id == 4 then show reason

		const status = document.getElementById('status');
		const reason = document.getElementById('reason');
		status.addEventListener('change', () => {
			if (status.value === '4') {
				reason.style.display = 'block';
			} else {
				reason.style.display = 'none';
			}
		});
	</script> --}}
@endsection
