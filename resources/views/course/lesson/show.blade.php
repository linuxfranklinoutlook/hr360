<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Learning Management - Lesson') }}
		</h2>
	</x-slot>
	
	<div class="py-6">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="overflow-hidden sm:rounded-lg">
				<div class="bg-black border-b border-gray-200 backdrop-filter backdrop-blur-xl">					
					<div style="">
						<video
							id="lesson-player"
							class="video-js vjs-default-skin vjs-16-9"
							controls
							preload="none"
							data-setup="{ responsive: true, fluid: true }"
							> 
							@if($lesson->video_url)
								<source src="{{ Storage::disk('s3')->url($lesson->video_url) }}" type="video/mp4" />
							@endif
							{{-- <source src="MY_VIDEO.webm" type="video/webm" /> --}}
						</video>
					</div>
				</div>

				<div class="px-6 py-6 bg-glass mb-6 mt-3 rounded-xl">
					<div class="flex items-center space-x-3">
						<div style="width: 58px; height: 58px;" class="flex-none">
							<div class="flex items-center justify-center rounded-full bg-gray-100 w-full h-full border-2 border-gray-500">
								<span>{{ $lesson->episode + 1 }}</span>
							</div>
						</div>
						<span class="space-y-1">
							<h3 class="text-3xl">{{ $lesson->title }}</h3>
							<p>
								{{ $lesson->description }}
							</p>
							<x-badge color="purple">
								<span>
									<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
								  	</svg>
								</span>
								<span>{{ $lesson->duration }}</span>
							</x-badge>
						</span>
					</div>
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

				let lesson = "{{ $lesson->id }}";
				let course = "{{ $course->id }}";

				let timestamp = localStorage.getItem(`lesson_timestamp_${lesson}_${course}`);

				if (timestamp > 0) {
					player.currentTime(timestamp);
				}
				
				player.hotkeys({
					volumeStep: 0.1,
					seekStep: 5,
					enableModifiersForNumbers: false
				});

				player.on('pause', () => {
					localStorage.setItem(`lesson_timestamp_${lesson}_${course}`, player.currentTime());
				});
				
				$( window ).on('beforeunload', function() {
					localStorage.setItem(`lesson_timestamp_${lesson}_${course}`, player.currentTime());
				});

			});
			
			window.onbeforeunload = function () {
				// localStorage.setItem('test_timestamp', player.currentTime())
				// Store Player timestamp, lesson_id, user_id, course_id; Resume playing id the parameters are the same.
			}
		</script>
	@endpush
</x-app-layout>
