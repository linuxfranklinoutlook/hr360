<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Learning Management - Showing Course: ' . $course->title) }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-glass border-b border-gray-200 backdrop-filter backdrop-blur-xl">

					<div class="flex space-x-3">
						<figure class="p-6 bg-blue-800 rounded-xl">
							<img src="{{ $course->cover_url }}" alt="" class="w-64">
						</figure>
						<span class="space-y-2">
							<h3 class="text-3xl">{{ $course->title }}</h3>
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
					
					@foreach ($course->lessons()->orderBy('episode', 'ASC')->get() as $l)
						<div class="flex items-center space-x-3">
							<a href="{{ route('courses.lesson', ['course' => $course, 'lesson' => $l]) }}" class="flex flex-1 p-6 items-center space-x-3 bg-gray-50 my-6 rounded-xl border border-gray-200 hover:shadow-lg transition-shadow duration-300">
								<div style="width: 58px; height: 58px;" class="flex-none">
									<div class="flex items-center justify-center rounded-full bg-gray-100 w-full h-full border-2 border-gray-500">
										<span>{{ $l->episode + 1 }}</span>
									</div>
								</div>
								<span class="inline-flex flex-col">
									<h3 class="text-2xl">{{ $l->title }}</h3>
									<p>
										{{ $l->description }}
									</p>
								</span>
							</a>
							@role('admin')
							<x-link-button href="{{ route('courses.lesson.edit', ['course' => $course->id, 'lesson' => $l->id]) }}">Edit</x-link-button>
							@endrole
						</div>

					@endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
