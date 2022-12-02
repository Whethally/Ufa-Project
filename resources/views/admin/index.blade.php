@extends('layouts.base')

@include('includes.header')
@include('includes.footer')

@section('content')
	<x-content>
		<x-content-title link="{{ __('Добавить заявку') }}" href="{{ route('profile.create') }}">{{ __('Мои заявки') }}
		</x-content-title>
		<div class="user-container">
			<x-content-body-items>
				@if (count($applications))
					@foreach ($applications as $item)
						<x-content-body>
							<x-content-image>
								<x-content-img before="{{ $item->image_before }}" after="{{ $item->image_after }}" src="{{ $item->image_after }}"
									alt="image" />
							</x-content-image>
							<x-content-info>
								<x-content-text>
									<x-content-text-block>
										<x-content-text-title>{{ $item->title }}</x-content-text-title>
									</x-content-text-block>
									<x-content-text-block>
										{{ $item->description }}
									</x-content-text-block>
									<x-content-text-block>
										<x-content-text-category>{{ $item->category_name }}</x-content-text-category>
									</x-content-text-block>
									<x-content-text-block>
										<x-content-text-date>{{ $item->created_at->diffForhumans() }}</x-content-text-date>
									</x-content-text-block>
									<x-content-text-block>
										{{ $item->status_name }}
									</x-content-text-block>
									@if ($item->status_id == 4)
										<x-content-text-block>
											{{ $item->reason }}
										</x-content-text-block>
									@endif
								</x-content-text>
							</x-content-info>
							<x-content-button href="{{ route('dashboard.edit', $item->id) }}">{{ __('Изменить') }}</x-content-button>
							<form class="btn-form" action="{{ route('profile.destroy', $item->id) }}" method="post">
								@csrf
								@method('DELETE')
								<button onclick="return confirm('{{ __('Вы уверены что хотите отменить заявку?') }}')" class="button"
									type="submit">{{ __('Отменить') }}</button>
							</form>
						</x-content-body>
					@endforeach
				@else
					{{ __('Нет заявок') }}
				@endif
			</x-content-body-items>
			<div class="filter">
				<x-auth.form action="" method="get">
					<div class="main-filters">
						<div class="filters-items">
							<div class="filter-item">
								<div class="filter-item-title">
									{{ __('Статус') }}
								</div>
								<div class="filter-item-content">
									<select name="status" id="status" class="form-control">
										<option value="">{{ __('Все') }}</option>
										@foreach ($statuses as $status)
											<option value="{{ $status->id }}" @if ($status->id == request()->status) selected @endif>{{ $status->name }}
											</option>
										@endforeach
									</select>
								</div>
							</div>
							<x-auth.button type="submit" class="w-100">
								{{ __('Применить') }}
							</x-auth.button>
						</div>
					</div>
				</x-auth.form>
			</div>
		</div>
		<x-content-title link="{{ __('Добавить категорию') }}" href="{{ route('dashboard.create') }}">{{ __('Категории') }}
		</x-content-title>
		<x-content-body-items>
			@if (count($categories))
				@foreach ($categories as $item)
					<x-content-body>
						<x-content-info>
							<x-content-text>
								<x-content-text-block>
									<x-content-text-title>{{ $item->name }}</x-content-text-title>
								</x-content-text-block>
								<x-content-text-block>
									{{ $item->description }}
								</x-content-text-block>
							</x-content-text>
						</x-content-info>
						<form class="btn-form" action="{{ route('dashboard.destroy', $item->id) }}" method="post">
							@csrf
							@method('DELETE')
							<button onclick="return confirm('{{ __('Вы уверены что хотите удалить категорию?') }}')" class="button"
								type="submit">{{ __('Удалить') }}</button>
						</form>
					</x-content-body>
				@endforeach
			@else
				{{ __('Нет категорий') }}
			@endif
		</x-content-body-items>
	</x-content>
@endsection
