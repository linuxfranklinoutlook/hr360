<x-app_admin>	
	@section('title')
	
		{{ Breadcrumbs::render('employees.create') }}
	
	@endsection

    <style>
        tr:nth-child(even) {
            background-color: rgb(214, 222, 230);
        }

        tr:nth-child(odd) {
            background-color: rgb(250, 250, 250);
        }
    </style>
        
  <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50">
	<div class="container mx-auto px-0 py-0 mt-4">
		<div class="max-w-7xl mx-auto sm:px-4 lg:px-2 overflow-hidden shadow-xs sm:rounded-lg">
				<h3 class="text-gray-900 text-4xl font-sm">Add Employee</h3>
				<h5 class="text-blue-900 text-1xl font-sm">Blue Hex Software Pvt Limited</h5>
                        @if ($errors->any())
                            <x-validation-error :errors="$errors" />
                        @endif
						<div class="py-6" x-data="{ 
							'same_as_permanent' : false, 
							'permanent' : { addr_line_1: '{{ old('permanent.addr_line_1') }}', addr_line_2: '', city: '', state: '', pincode: '', },
							'current' : { addr_line_1: '', addr_line_2: '', city: '', state: '', pincode: '', },
							copyToCurrent: function() {
							 return this.current = {...this.permanent}
							},
						   }">
                        <form action="{{ route('admin.employees.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="grid grid-cols-2 gap-6 ">

                                <div class="backdrop-filter backdrop-blur-lg px-3 py-3 rounded-md shadow my-3 ">
                                    <span class="flex items-center justify-between py-3  ">

                                        <h3 class="antialiased">Personal Information</h3>
                                        {{-- <a href="#">
												<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
												</svg>
											</a> --}}
                                    </span>
                                    <div class="my-6">
                                        <x-input type="text" label="First Name *" name="first_name"
                                            value="{{ old('first_name') }}" required />
                                    </div>
                                    <div class="my-6">
                                        <x-input type="text" label="Middle Name" name="middle_name"
                                            value="{{ old('middle_name') }}" />
                                    </div>
                                    <div class="my-6">
                                        <x-input type="text" label="Last Name *" name="last_name"
                                            value="{{ old('last_name') }}" required />
                                    </div>
                                    <div class="my-6">
                                        <x-input type="email" label="Personal Email Address *" name="personal_email"
                                            value="{{ old('personal_email') }}" required />
                                        <p class="text-gray-400 text-xs">Please enter personal email of the employee.
                                        </p>
                                    </div>
                                    <div class="my-6">
                                        <x-input type="text" label="Phone Number *" name="phone_number"
                                            value="{{ old('phone_number') }}" maxlength="10" required />
                                    </div>
                                    <div class="my-6">
                                        <x-input type="date"  label="Date of Birth *" name="date_of_birth"
                                            value="{{ old('date_of_birth') }}" data-toggle="datepicker" />
                                    </div>

                                    <div class="my-6">
                                        <x-select label="Blood Group" name="blood_group">
                                            <option value="">select</option>
                                            <option value="A +">A positive (A+)</option>
                                            <option value="A -">A negative (A-)</option>
                                            <option value="B +">B positive (B+)</option>
                                            <option value="B -">B negative (B-)</option>
                                            <option value="O +">O positive (O+)</option>
                                            <option value="O -">O negative (O-)</option>
                                            <option value="AB +">AB positive (AB+)</option>
                                            <option value="AB -">AB negative (AB-)</option>
                                        </x-select>
                                    </div>
                                    <div class="my-6">
                                        <x-input type="text" label="Aadhar Number" name="aadhar" maxlength="12"
                                            value="{{ old('aadhar') }}" required />
                                    </div>
                                    <div class="my-6">
                                        <x-input type="text" label="PAN" name="pan" value="{{ old('pan') }}"
                                            maxlength="10" required />
                                    </div>
                                    <div class="my-6">
                                        <x-select type="text" label="Gender *" name="gender" required>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </x-select>
                                    </div>
                                </div>



                                <div class="backdrop-filter backdrop-blur-lg px-3 py-3 rounded-md shadow my-3">
                                    <span class="flex items-center justify-between py-3">
                                        <h3 class="antialiased">Employment Information</h3>
                                        <a href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </a>
                                    </span>
                                    <div class="my-6">
                                        <x-input type="text" label="Employee ID *" name="emp_id"
                                            value="{{ old('emp_id') }}" required />
                                    </div>
                                    <div class="my-6">
                                        <x-select type="text" label="Employee Type *" name="emp_type" required>
                                            <option value="Full Time">Full Time</option>
                                            <option value="Intern">Intern</option>
                                            <option value="Contract">Contract</option>
                                        </x-select>
                                    </div>
                                    <div class="my-6">
                                        <x-input type="date" label="Date of Joining *" name="date_of_joining"
                                            data-toggle="datepicker" />
                                    </div>
                                    <div class="my-6">
                                        <x-select label="Location" name="location">
                                            <option value="Remote">Remote</option>
                                            <option value="Client On-site">Client On-site</option>
                                            <option value="On-site">On-site</option>
                                        </x-select>
                                    </div>
                                    <div class="my-6">
                                        <x-select label="Status *" name="status">
                                            <option value="Active">Active</option>
                                            <option value="Resigned">Resigned</option>
                                            <option value="Sabbatical">Sabbatical</option>
                                            <option value="Terminated">Terminated</option>

                                        </x-select>
                                    </div>
                                    <div class="my-6">
                                        <x-select label="Desigination *" name="desigination">
                                            <option value="HR Management">HR Management</option>
                                            <option value="Finance Admin">Finance Admin</option>
                                            <option value="IT Admin">IT Admin</option>
                                            <option value="Full Stack Developer">Full Stack Developer</option>
                                            <option value="Full Stack Developer & Tech Support">Full Stack Developer &
                                                Tech Support</option>
                                            <option value="Flutter Developer">Flutter Developer</option>
                                            <option value="Quality Analyst">Quality Analyst</option>
                                            <option value="Marketing/Sales">Marketing/Sales</option>
                                            <option value="DevOps & s/w Developer">DevOps & s/w developer</option>
                                            <option value="Product Manager">Product Manager</option>
                                            <option value="Project Manager">Project Manager</option>
                                            <option value="UI/UX Developer">UI/UX Developer</option>
                                            <option value="Front End Developer">Front End Developer</option>
                                            <option value="Founder">Founder</option>
                                            <option value="Co-Founder">Co-Founder</option>
                                            <option value="Others">Others</option>

                                        </x-select>
                                    </div>
                                    <div class="my-6">
                                        <x-textarea type="textarea" label="Notes" name="notes"
                                            value="{{ old('notes') }}" required />
                                        <p class="text-gray-400 text-xs">
                                        </p>
                                    </div>
                                </div>
                            </div>





                            <div class="grid grid-cols-2 gap-6">

                                <div class="backdrop-filter backdrop-blur-lg px-3 py-3 rounded-md shadow my-3">
                                    <h3 class="text-xl">Permanent Address</h3>
                                    <div class="my-6">
                                        <x-textarea label="Permanent Address - Address Line 1"
                                            name="permanent_address[addr_line_1]" x-model="permanent.addr_line_1"
                                            required />
                                    </div>
                                    <div class="my-6">
                                        <x-textarea label="Permanent Address - Address Line 2"
                                            name="permanent_address[addr_line_2]" x-model="permanent.addr_line_2"
                                            required />
                                    </div>
                                    <div class="my-6">
                                        <x-select label="Permanent Address - State" name="permanent_address[state]"
                                            x-model.lazy="permanent.state" required>
                                            @foreach ($states as $state)
                                                <option value="{{ $state->name }}">{{ $state->name }}</option>
                                            @endforeach
                                        </x-select>
                                        {{-- <x-input type="text" label="current Address - State" name="current_address['state']" x-model.lazy="current.state" required /> --}}
                                    </div>



                                    <div class="my-6">
                                        <x-input type="text" label="Permanent Address - City"
                                            name="permanent_address[city]" x-model="permanent.city" required />
                                    </div>

                                    <div class="my-6">
                                        <x-input type="text" maxlength="6" label="Permanent Address - Pincode"
                                            name="permanent_address[pincode]" x-model="permanent.pincode" required />
                                    </div>
                                </div>

                                <div class="backdrop-filter backdrop-blur-lg px-3 py-3 rounded-md shadow my-3">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-xl">Present Address</h3>
                                        <span class="inline-flex space-x-1">
                                            <x-small-button type="button" @click="copyToCurrent">Same as Permanent
                                            </x-small-button>
                                        </span>
                                    </div>
                                    <div class="my-6">
                                        <x-textarea label="Present Address - Address Line 1"
                                            name="current_address[addr_line_1]" x-model.lazy="current.addr_line_1"
                                            required />
                                    </div>
                                    <div class="my-6">
                                        <x-textarea label="Present Address - Address Line 2"
                                            name="current_address[addr_line_2]" x-model.lazy="current.addr_line_2"
                                            required />
                                    </div>
                                    <div class="my-6">
                                        <x-select label="Current Address - State" name="current_address[state]"
                                            x-model.lazy="current.state" required>
                                            @foreach ($states as $state)
                                                <option value="{{ $state->name }}">{{ $state->name }}</option>
                                            @endforeach
                                        </x-select>
                                        {{-- <x-input type="text" label="current Address - State" name="current_address['state']" x-model.lazy="current.state" required /> --}}
                                    </div>
                                    <div class="my-6">
                                        <x-input type="text" label="current Address - City" name="current_address[city]"
                                            x-model.lazy="current.city" required />
                                    </div>
                                    <div class="my-6">
                                        <x-input type="text" maxlength="6" label="current Address - Pincode"
                                            name="current_address[pincode]" x-model.lazy="current.pincode" required />
                                    </div>
                                </div>
                            </div>



                            <div class="grid grid-cols-2 gap-6">
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
                                        <x-input type="text" label="Bank Name" name="bank_account_bank" required
                                            value="{{ old('bank_account_bank') }}" />
                                    </div>
                                    <div class="my-6">
                                        <x-input type="number" label="Bank Account Number" name="bank_account_number"
                                            value="{{ old('bank_account_number') }}" required />
                                    </div>
                                    <div class="my-6">
                                        <x-input type="text" label="Bank Account Holder Name" name="bank_account_name"
                                            required value="{{ old('bank_account_name') }}" />
                                    </div>
                                    <div class="my-6">
                                        <x-input type="text" label="Bank Account Branch" name="bank_account_branch"
                                            value="{{ old('bank_account_branch') }}" required />
                                    </div>
                                    <div class="my-6">
                                        <x-input type="text" label="Bank Account IFSC" name="bank_account_ifsc"
                                            value="{{ old('bank_account_ifsc') }}" required />
                                    </div>
                                    <div class="my-6">
                                        <x-input type="text" label="Bank Account MICR" name="bank_account_micr"
                                            value="{{ old('bank_account_micr') }}" required />
                                    </div>
                                </div>


                                <div class="backdrop-filter backdrop-blur-lg px-3 py-3 rounded-md shadow my-3">
                                    <span class="flex items-center justify-between py-3">
                                        <h3 class="antialiased">Emergency Contacts</h3>
                                        {{-- <a href="#">
												<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
												</svg>
											</a> --}}
                                    </span>
                                    <div class="my-6">
                                        <x-input type="text" label="Emergency Contact Name *"
                                            name="emergency_contact_name" value="{{ old('emergency_contact_name') }}"
                                            maxlength="40" required />
                                    </div>
                                    <div class="my-6">
                                        <x-input type="number" label="Emergency Contact Number *"
                                            name="emergency_contact_number"
                                            value="{{ old('emergency_contact_number') }}" maxlength="10" required />
                                    </div>
                                    <div class="my-6">
                                        <x-select label="Emergency Contact relationship *"
                                            name="emergency_relationship">
                                            <option value="Father">Father</option>
                                            <option value="Mother">Mother</option>
                                            <option value="Husband">Husband</option>
                                            <option value="Wife">Wife</option>
                                            <option value="Brother">Brother</option>
                                            <option value="Sister">Sister</option>
                                            <option value="Relative">Relative</option>
                                            <option value="Others">Others</option>

                                        </x-select>
                                    </div>

                                </div>
                            </div>


                            <div class="grid grid-cols-2 gap-6">

                                <div class="backdrop-filter backdrop-blur-lg px-3 py-3 rounded-md shadow my-3">
                                    <span class="flex items-center justify-between py-3">
                                        <h3 class="antialiased">Login Info</h3>
                                        {{-- <a href="#">
											<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
												<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
											</svg>
										</a> --}}
                                    </span>
                                    <div class="my-6" style="width: 90px; height: 90px;">
                                        <input type="file" label="Upload Picture" name="profile_pic"
                                            class="profile-input" accept="image/png, image/jpeg, image/gif" />
                                    </div>
                                    <div class="my-6">
                                        <x-input type="text" label="Login Email *" name="user_email" required />
                                    </div>
                                    <div class="my-6">
                                        <x-input type="password" label="Login Password *" name="user_password"
                                            required />
                                    </div>
                                    <div class="my-6">
                                        <x-input type="password" label="Confirm Login Password *"
                                            name="user_password_confirmation" required />
                                    </div>
                                </div>

                                <div class="backdrop-filter backdrop-blur-lg px-3 py-3 rounded-md shadow my-3">
                                    <span class="flex items-center justify-between py-3">
                                        <h3 class="antialiased">Documents</h3>
                                    </span>
                                    <div class="my-6">
                                        <x-input type="file" class="signed-docs" multiple
                                            label="Upload Signed Documents" name="signed_docs[]" />
                                    </div>
                                    <div class="my-6">
                                        <x-input type="file" class="other-docs" multiple
                                            label="Upload Other Documents" name="other_docs[]" />
                                    </div>
                                </div>
                            </div>
                            <span class="flex items-right justify-center my-3 space-x-3 px-4">
                                <x-button color="green">Submit</x-button>
								<x-link-button color="red"
															   href="{{ route('admin.employees.index') }}">
															   Back
															</x-link-button>
                            </span>
							
                    </div>


                    </form>
		</div>
	</div>

  </main>
</x-app_admin>

        @push('footerScripts')
            <script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js">
            </script>
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
                const pond = FilePond.create(inputElement, {
                    storeAsFile: true
                });
                const otherPond = FilePond.create(otherDocs, {
                    storeAsFile: true
                });

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

