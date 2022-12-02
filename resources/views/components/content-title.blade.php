<div class="content__title">
	<h1 class="content__title-text">{{ $slot }}</h1>
	@if (isset($total))
		<div class="content__title-total">
			<p class="content__title-total-text">{{ $total }}</p>
		</div>
	@endif
	@if (isset($link))
		<div class="content__title-link">
			<a class="button" href="{{ $href }}">{{ $link }}</a>
		</div>
	@endif
	@if (isset($logout))
		<div class="content__title-button">
			<form action="{{ route('logout') }}" method="POST">
				@csrf
				<button class="button" type="submit">{{ $logout }}</button>
			</form>
		</div>
	@endif
</div>
