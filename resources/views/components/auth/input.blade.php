@props(['value' => ''])

<input id="floatingInput"
	{{ $attributes->class(['form-control', 'readonly' => 'true'])->merge([
	    'type' => 'text',
	    'value' => old($attributes->get('name')) ?: $value,
	]) }}>
