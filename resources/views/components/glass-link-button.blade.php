@props(
['colors' => [
	'blue' => 'bg-gradient-to-r from-blue-400 via-blue-500 text-xs to-blue-600 active:bg-blue-900 hover:from-blue-500 hover:to-blue-800 active:bg-blue-400',
	'red' => 'bg-gradient-to-r from-red-400 via-red-500 text-xs to-red-600 active:bg-red-900 hover:from-red-500 hover:to-red-800 active:bg-red-400',
],'color' => 'red'])


<a 
	{{ $attributes->merge([
		'type' => 'submit', 
		'class' => 'inline-flex items-center px-4 py-2 rounded shadow-xl font-semibold text-white uppercase tracking-widest focus:outline-none  disabled:opacity-25 transition ease-in-out duration-150 active:shadow-sm transition-all duration-75 ' . $colors[$color],
		'href' => '#'
		]) 
	}}>

    {{ $slot }}
</a>
