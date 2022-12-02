@extends('layouts.base')

@include('includes.header')
@include('includes.footer')

@section('content')
	<x-content>
		<x-content-title logout="Выйти">{{ __('Профиль') }}</x-content-title>
		<div class="content__user-text">
			<div class="content__user-title">
				<h2 class="content__text-fio-text">
					{{ $user->getShortNameAttribute() }}
				</h2>
			</div>
			<div class="content__user-category">
				<p class="content__user-login-text">{{ $user->login }}</p>
			</div>
			<div class="content__user-email">
				<p class="content__user-email-text">{{ $user->email }}</p>
			</div>
		</div>
		<x-content-title link="{{ __('Добавить заявку') }}" href="{{ route('profile.create') }}">{{ __('Мои заявки') }}
		</x-content-title>
		<div class="user-container">
			<x-content-body-items>
				{{-- <x-content-body>
					<x-content-image>
						<x-content-img before="{{ asset('img/image2.jpg') }}" after="{{ asset('img/image.jpg') }}"
							src="{{ asset('img/image.jpg') }}" alt="image" />
					</x-content-image>
					<x-content-info>
						<x-content-text>
							<x-content-text-block>
								<x-content-text-title>{{ __('Заявка №1') }}</x-content-text-title>
							</x-content-text-block>
							<x-content-text-block>
								<x-content-text-category>{{ __('Категория') }}</x-content-text-category>
							</x-content-text-block>
							<x-content-text-block>
								<x-content-text-date>{{ __('Дата') }}</x-content-text-date>
							</x-content-text-block>
							<x-content-text-block>
								<x-content-text-status>{{ __('Статус') }}</x-content-text-status>
							</x-content-text-block>
						</x-content-text>
					</x-content-info>
					<x-content-button href="#">{{ __('Удалить') }}</x-content-button>
				</x-content-body> --}}
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
							@if ($item->status_id == 1)
								<form class="btn-form" action="{{ route('profile.destroy', $item->id) }}" method="post">
									@csrf
									@method('DELETE')
									<button onclick="return confirm('{{ __('Вы уверены что хотите отменить заявку?') }}')" class="button"
										type="submit">{{ __('Отменить') }}</button>
								</form>
							@endif
						</x-content-body>
					@endforeach
				@else
					{{ __('Нет заявок') }}
				@endif
			</x-content-body-items>
			@if (count($applications))
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
			@endif
		</div>
	</x-content>
@endsection
