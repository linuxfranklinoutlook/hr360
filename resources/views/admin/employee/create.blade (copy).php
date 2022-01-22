<x-app-layout>

    <x-slot name="breadcrumbs">
		{{ Breadcrumbs::render('employees.create') }}
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employee Management') }}
        </h2>
    </x-slot>

    <div class="py-6" 
		x-data="{ 
			'same_as_permanent' : false, 
			'permanent' : { addr_line_1: '{{ old('permanent.addr_line_1') }}', addr_line_2: '', city: '', state: '', pincode: '', },
			'current' : { addr_line_1: '', addr_line_2: '', city: '', state: '', pincode: '', },
			copyToCurrent: function() {
				return this.current = {...this.permanent}
			},
		}">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-glass backdrop-filter backdrop-blur-xl">
					<h3 class="text-xl">Add an Employee</h3>

					@if($errors->any())
						<x-validation-error :errors="$errors" />
					@endif

					<form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
						@csrf

						<div class="grid grid-cols-2 gap-6">
							<div>
								<div class="backdrop-filter backdrop-blur-lg px-3 py-3 rounded-md shadow my-3">
									<span class="flex items-center justify-between py-3">
										<h3 class="antialiased">Personal Information</h3>
										{{-- <a href="#">
											<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
												<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
											</svg>
										</a> --}}
									</span>
									<div class="my-6">
										<x-input type="text" label="First Name" name="first_name" value="{{ old('first_name') }}" required />
									</div>
									<div class="my-6">
										<x-input type="text" label="Last Name" name="last_name" value="{{ old('last_name') }}" required />
									</div>
									<div class="my-6">
										<x-input type="email" label="Personal Email Address" name="personal_email" value="{{ old('personal_email') }}" required />
										<p class="text-gray-400 text-xs">Please enter personal email of the employee.</p>
									</div>
									<div class="my-6">
										<x-input type="text" label="Phone Number" name="phone_number" value="{{ old('phone_number') }}" maxlength="10" required />
									</div>
									<div class="my-6">
										<x-input type="text" label="Date of Birth" name="date_of_birth" data-toggle="datepicker" />
									</div>
								</div>
								
								<div class="backdrop-filter backdrop-blur-lg px-3 py-3 rounded-md shadow my-3">
									<span class="flex items-center justify-between py-3">
										<h3 class="antialiased">Employment Information</h3>
										<a href="#">
											<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
												<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
											</svg>
										</a>
									</span>
									<div class="my-6">
										<x-input type="text" label="Employee ID" name="emp_id" value="{{ old('emp_id') }}" required />
									</div>
									<div class="my-6">
										<x-select type="text" label="Employee Type" name="emp_type" required>
											<option value="Full Time">Full Time</option>
											<option value="Intern">Intern</option>
											<option value="Contract">Contract</option>
										</x-select>
									</div>
									<div class="my-6">
										<x-input type="text" label="Date of Joining" name="date_of_joining" data-toggle="datepicker" />
									</div>
									<div class="my-6">
										<x-select label="Location" name="location">
											<option value="Remote">Remote</option>
											<option value="Client On-site">Client On-site</option>
											<option value="On-site">On-site</option>
										</x-select>
									</div>
									<div class="my-6">
										<x-select label="Status" name="status">
											<option value="active">Active</option>
											<option value="resigned">Resigned</option>
											<option value="sabbatical">Sabbatical</option>
										</x-select>
									</div>
								</div>
								
		
								<div class="backdrop-filter backdrop-blur-lg px-3 py-3 rounded-md shadow my-3">
									<h3 class="text-xl">Permanent Address</h3>
									<div class="my-6">
										<x-textarea label="Permanent Address - Address Line 1" name="permanent_address[addr_line_1]" x-model="permanent.addr_line_1" required />
									</div>
									<div class="my-6">
										<x-textarea label="Permanent Address - Address Line 2" name="permanent_address[addr_line_2]" x-model="permanent.addr_line_2" required />
									</div>
									<div class="my-6">
										<x-select label="Permanent Address - State" name="permanent_address[state]" x-model.lazy="permanent.state" required>
											@foreach($states as $state)
												<option value="{{ $state->name }}">{{ $state->name }}</option>
											@endforeach
										</x-select>
										{{-- <x-input type="text" label="current Address - State" name="current_address['state']" x-model.lazy="current.state" required /> --}}
									</div>
									<div class="my-6">
										<x-input type="text" label="Permanent Address - City" name="permanent_address[city]" x-model="permanent.city" required />
									</div>
									<div class="my-6">
										<x-input type="text" maxlength="6" label="Permanent Address - Pincode" name="permanent_address[pincode]" x-model="permanent.pincode" required />
									</div>
								</div>
								
								<div class="backdrop-filter backdrop-blur-lg px-3 py-3 rounded-md shadow my-3">
									<div class="flex items-center justify-between">
										<h3 class="text-xl">Current Address</h3>
										<span class="inline-flex space-x-1">
											<x-small-button type="button" @click="copyToCurrent">Same as Permanent</x-small-button>
										</span>
									</div>
									<div class="my-6">
										<x-textarea label="Current Address - Address Line 1" name="current_address[addr_line_1]" x-model.lazy="current.addr_line_1" required />
									</div>
									<div class="my-6">
										<x-textarea label="Current Address - Address Line 2" name="current_address[addr_line_2]" x-model.lazy="current.addr_line_2" required />
									</div>
									<div class="my-6">
										<x-select label="Current Address - State" name="current_address[state]" x-model.lazy="current.state" required>
											@foreach($states as $state)
												<option value="{{ $state->name }}">{{ $state->name }}</option>
											@endforeach
										</x-select>
										{{-- <x-input type="text" label="current Address - State" name="current_address['state']" x-model.lazy="current.state" required /> --}}
									</div>
									<div class="my-6">
										<x-input type="text" label="current Address - City" name="current_address[city]" x-model.lazy="current.city" required />
									</div>
									<div class="my-6">
										<x-input type="text" maxlength="6" label="current Address - Pincode" name="current_address[pincode]" x-model.lazy="current.pincode" required />
									</div>
								</div>
							</div>

							<div>
								<div class="backdrop-filter backdrop-blur-lg px-3 py-3 rounded-md shadow my-3">
									<span class="flex items-center justify-between py-3">
										<h3 class="antialiased">Bank Account Information</h3>
										{{-- <a href="#">
											<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
												<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
											</svg>
										</a> --}}
									</span>
									<div class="my-6">
										<x-input type="text" label="Bank" name="bank_account_bank" required />
									</div>
									<div class="my-6">
										<x-input type="text" label="Bank Account Number" name="bank_account_number" required />
									</div>
									<div class="my-6">
										<x-input type="text" label="Bank Account Name" name="bank_account_name" required />
									</div>
									<div class="my-6">
										<x-input type="text" label="Bank Account Branch" name="bank_account_branch" required />
									</div>
									<div class="my-6">
										<x-input type="text" label="Bank Account IFSC" name="bank_account_ifsc" required />
									</div>
								</div>
								<div class="backdrop-filter backdrop-blur-lg px-3 py-3 rounded-md shadow my-3">
									<span class="flex items-center justify-between py-3">
										<h3 class="antialiased">Documents</h3>
										{{-- <a href="#">
											<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
												<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
											</svg>
										</a> --}}
									</span>
									<div class="my-6" style="width: 190px; height: 190px;">
										<x-input type="file" label="Upload Picture" name="profile_pic" class="profile-input" accept="image/png, image/jpeg, image/gif" />
									</div>
									<div class="my-6">
										<x-input type="text" label="Login Email" name="user_email" required />
									</div>
									<div class="my-6">
										<x-input type="password" label="Login Password" name="user_password" required />
									</div>
									<div class="my-6">
										<x-input type="password" label="Confirm Login Password" name="user_password_confirmation" required />
									</div>
									<div class="my-6">
										<x-input type="file" class="signed-docs" multiple label="Upload Signed Documents" name="signed_docs[]" />
									</div>
									<div class="my-6">
										<x-input type="file" class="other-docs" multiple label="Upload Other Documents" name="other_docs[]" />
									</div>
								</div>
							</div>
						</div>

						<x-button>Submit</x-button>
					</form>
                </div>
            </div>
        </div>
    </div>
	@push('footerScripts')
		<script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js"></script>
		<script src="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.js"></script>
		<script src="https://unpkg.com/filepond-plugin-image-transform/dist/filepond-plugin-image-transform.js"></script>
		<script src="https://unpkg.com/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.js"></script>
		<script src="https://unpkg.com/filepond-plugin-image-crop/dist/filepond-plugin-image-crop.js"></script>
		<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
		<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
		<script>
			FilePond.registerPlugin(
				// FilePondPluginFileValidateType,
				// FilePondPluginImageExifOrientation,
				FilePondPluginImagePreview,
				FilePondPluginImageCrop,
				FilePondPluginImageResize,
				FilePondPluginImageTransform,
				FilePondPluginImageEdit
			);

			const inputElement = document.querySelector('.signed-docs');
			const otherDocs = document.querySelector('.other-docs');
			const pond = FilePond.create(inputElement, { storeAsFile: true });
			const otherPond = FilePond.create(otherDocs, { storeAsFile: true });

			const profileInputElement = document.querySelector('.profile-input');
			const profilePond = FilePond.create(profileInputElement, {
				labelIdle: `Drag & Drop your picture or <span class="filepond--label-action">Browse</span>`,
				imagePreviewHeight: 170,
				imageCropAspectRatio: '1:1',
				imageResizeTargetWidth: 200,
				imageResizeTargetHeight: 200,
				stylePanelLayout: 'compact circle',
				styleLoadIndicatorPosition: 'center bottom',
				styleProgressIndicatorPosition: 'right bottom',
				styleButtonRemoveItemPosition: 'left bottom',
				styleButtonProcessItemPosition: 'right bottom',
			});
		</script>
	@endpush
</x-app-layout>
