<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Learning Management - Home') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-glass border-b border-gray-200 backdrop-filter backdrop-blur-xl">
					<h3 class="text-3xl">Track your Learning Progress</h3>

					<div class="grid grid-cols-4 mt-6">
						<a href="{{ route('courses.index') }}" class="border-2 border-blue-200 px-3 py-3 rounded-xl hover:bg-blue-500 hover:text-white transition-all duration-300 text-center">
							<img src="{{ asset('images/award.png') }}" alt="" srcset="" class="mx-auto transform hover:scale-125 transition-transform duration-300">
							<h3 class="text-4xl">Courses</h3>
						</a>
					</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
