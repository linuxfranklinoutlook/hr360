<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Learning Management - Courses') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-glass border-b border-gray-200 backdrop-filter backdrop-blur-xl">
					<h3 class="text-3xl">Showing All our Courses</h3>

					@foreach ($courses as $course)
						<div class="flex py-6 space-x-3 items-start">
							<figure class="bg-blue-800 p-6 rounded-xl inline-block flex-none">
								<img src="{{ $course->cover_url }}" alt="" class="w-32">
							</figure>
							<span class="space-y-1">
								<x-link href="{{ $course->path() }}" class="text-3xl">{{ $course->title }}</x-link>
								<p class="text-gray-500">{{ $course->description }}</p>
								@php
									$colors = [
										'Beginner' => 'green',
										'Intermediate' => 'yellow',
										'Expert' => 'red'
									];
								@endphp
								<x-badge color="{{ $colors[$course->difficulty_level] }}">{{ $course->difficulty_level }}</x-badge>
							</span>
						</div>
					@endforeach

					{{ $courses->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
