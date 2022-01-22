<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Learning Management - Create Course') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-glass border-b border-gray-200 backdrop-filter backdrop-blur-xl">
					<h3 class="text-3xl">Create New Course</h3>

					@if($errors->any())
						<x-validation-error :errors="$errors" />
					@endif

					<form action="" method="POST" enctype="multipart/form-data">
						@csrf

						<div class="block py-3 mt-6">
							<x-input type="text" name="title" label="Title" />
						</div>
						
						<div class="block py-3">
							<x-textarea name="description" label="Description" />
						</div>
						
						<div class="block py-3">
							<x-input type="file" name="cover_file" label="Cover File" />
						</div>
						
						<div class="block py-3">
							@php
								$difficulties = ['Beginner','Intermediate','Expert'];
							@endphp
							<x-select name="difficulty_level" label="Difficulty Level">
								@foreach ($difficulties as $d)
									<option value="{{ $d }}">{{ $d }}</option>
								@endforeach
							</x-select>
						</div>
					</form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
