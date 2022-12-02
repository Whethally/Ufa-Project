@props(['href' => '#'])

<a {{ $attributes->merge(['class' => 'form-link']) }} href="{{ $href }}">
	{{ $slot }}
