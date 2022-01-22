@props(['disabled' => false, 'label' => $label ?? 'Untitled Label'])

{{-- <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}> --}}
{{-- 
<div class="relative border border-gray-300 rounded-md px-3 py-3 shadow-sm focus-within:ring-1 focus-within:ring-blue-600 focus-within:border-blue-600">
	<label for="name" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-blue-900">{{ ucfirst($label) }}</label>
	<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'block w-full border-0 p-0 text-gray-900 placeholder-gray-400 focus:ring-0 sm:text-sm']) !!}>
		{{ $slot }}
	</select>
</div> --}}
<div>
	<label for="" class="text-sm px-1 py-1 block text-gray-500 font-semibold">{{ ucfirst($label) }}</label>
	<select 
		{!! $attributes->merge([
			'class' => 'block w-full border-0 px-3 py-3 rounded-md bg-white focus:ring-0 shadow text-gray-500',
			'placeholder' => "Please enter " . $label
		]) !!}
	>
		{{ $slot }}
	</select>
</div>
