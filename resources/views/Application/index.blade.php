@extends('layouts.base')

@include('includes.header')
@include('includes.footer')

@section('content')
	<x-content>
		<x-content-title total="{{ __('Количество решенных заявок: ') }} {{ count($applications) }}">{{ __('Заявки') }}
		</x-content-title>
		<x-content-body-items>
			@if (count($applications))
				@foreach ($applications->take(4) as $item)
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
									<x-content-text-date>{{ $item->updated_at->diffForhumans() }}</x-content-text-date>
								</x-content-text-block>
								<x-content-text-block>
									{{ $item->status_name }}
								</x-content-text-block>
							</x-content-text>
						</x-content-info>
					</x-content-body>
				@endforeach
			@else
				{{ __('Нет заявок') }}
			@endif
		</x-content-body-items>
	</x-content>
@endsection
