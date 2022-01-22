<x-app-layout>

	<x-slot name="breadcrumbs">
		{{ Breadcrumbs::render('dashboard') }}
	</x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
	

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-glass border-b border-gray-200 backdrop-filter backdrop-blur-xl">
					<div class="flex items-center">
						<img src="{{ asset('images/dashboard.png') }}" alt="" class="w-32" />
						<h3 class="text-3xl ml-3 font-light">We're building this space! Check back later.</h3>
					</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
