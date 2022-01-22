<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Learning Management - Edit Lesson') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-glass border-b border-gray-200 backdrop-filter backdrop-blur-xl">
					<h3 class="text-3xl">{{ $lesson->title }}</h3>

					<form action="" method="POST" enctype="multipart/form-data">
						@csrf
						
						<div class="block py-3 mt-6">
							<x-input type="text" label="Title" value="{{ $lesson->title }}" name="title" />
						</div>
						
						<div class="block py-3 mt-6">
							<x-textarea label="Description" name="description">{{ $lesson->description }}</x-textarea>
						</div>

						<div class="block py-3">
							<x-input type="text" label="Duration" value="{{ $lesson->duration }}" name="duration" />
						</div>
						
						<div class="block py-3">
							<x-input type="text" label="Episode" value="{{ $lesson->episode }}" name="episode" />
							<p>The last episode in this series is {{ \App\Models\Lesson::latest()->first()->id }}</p>
						</div>
						
						@if($lesson->cover_url)
							<div class="block py-3 rounded-xl">
								<img src="{{ Storage::disk('s3')->url($lesson->cover_url) }}" alt="" class="w-32" />
							</div>
						@endif

						<div class="block py-3">
							<x-input type="file" label="Cover Image" name="cover_file" />
						</div>

						@if($lesson->video_url)
							<video
								id="lesson-player"
								class="video-js vjs-default-skin vjs-16-9 rounded-xl"
								controls
								preload="none"
								data-setup="{ responsive: true, fluid: true }"
								> 
								@if($lesson->video_url)
									<source src="{{ Storage::disk('s3')->url($lesson->video_url) }}" type="video/mp4" />
								@endif
								{{-- <source src="MY_VIDEO.webm" type="video/webm" /> --}}
							</video>
						@endif
						
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
	@push('footerScripts')
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="https://vjs.zencdn.net/7.14.3/video.min.js"></script>
		<script src="//cdn.sc.gl/videojs-hotkeys/0.2/videojs.hotkeys.min.js"></script>
		<script>

			$(function() {
				
				let player = videojs('lesson-player');

				// let lesson = "{{ $lesson->id }}";
				// let course = "{{ $course->id }}";

				// let timestamp = localStorage.getItem(`lesson_timestamp_${lesson}_${course}`);

				// if timestamp > 0 {
				// 	player.currentTime(timestamp);
				// }
				
				player.hotkeys({
					volumeStep: 0.1,
					seekStep: 5,
					enableModifiersForNumbers: false
				});
				
				// $( window ).on('beforeunload', function() {
				// 	localStorage.setItem(`lesson_timestamp_${lesson}_${course}`, player.currentTime());
				// });

			});
			
			window.onbeforeunload = function () {
				// localStorage.setItem('test_timestamp', player.currentTime())
				// Store Player timestamp, lesson_id, user_id, course_id; Resume playing id the parameters are the same.
			}
		</script>
	@endpush
</x-app-layout>
