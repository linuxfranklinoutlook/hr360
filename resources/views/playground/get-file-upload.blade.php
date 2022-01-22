<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Playground - Upload File') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 backdrop-filter backdrop-blur-xl">
					<h3 class="text-3xl">Testing File Upload</h3>

					<form action="" enctype="multipart/form-data" method="POST">
						@csrf
						<input type="file" name="attachments[]" multiple class="my-3" />

						<x-button>Upload</x-button>
					</form>
                </div>
            </div>
        </div>
    </div>

	@push('footerScripts')
		<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
		<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
		<script>
			FilePond.registerPlugin(
				FilePondPluginImagePreview,
				// FilePondPluginImageExifOrientation,
				// FilePondPluginFileValidateSize,
				// FilePondPluginImageEdit
			);

			const inputElement = document.querySelector('input[type="file"]');
			const pond = FilePond.create(inputElement, { storeAsFile: true });
		</script>
	@endpush
</x-app-layout>
