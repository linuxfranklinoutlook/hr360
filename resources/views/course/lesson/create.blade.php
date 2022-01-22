<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Learning Management - Create Lesson') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-glass border-b border-gray-200 backdrop-filter backdrop-blur-xl">
					<h3 class="text-3xl">Create New Lesson</h3>

					<form action="" method="POST" enctype="multipart/form-data">
						@csrf
						
						<div class="block py-3 mt-6">
							<x-input type="text" label="Title" value="{{ old('title') }}" name="title" />
						</div>
						
						<div class="block py-3 mt-6">
							<x-textarea label="Description" value="{{ old('description') }}" name="description" />
						</div>

						<div class="block py-3">
							<x-input type="text" label="Duration" value="{{ old('duration') }}" name="duration" />
						</div>
						
						<div class="block py-3">
							<x-input type="text" label="Episode" value="{{ old('episode') }}" name="episode" />
							<p>The last episode in this series is {{ $course->lessons->count() }}</p>
						</div>
						

						<div class="block py-3">
							<x-input type="file" label="Cover Image" name="cover_file" />
						</div>
						
						<div class="block py-3">
							<x-input type="file" label="Video" name="video_file" />
						</div>

						<div class="block py-3">
							<x-button>Submit</x-button>
						</div>

					</form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
