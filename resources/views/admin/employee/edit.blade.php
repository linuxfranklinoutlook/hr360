<x-app_admin>
    @section('title')
        
            {{ Breadcrumbs::render('employees.edit') }}
        
    @endsection

    <div class="flex-1  flex flex-col  shadow-sm rounded-md  ">

        <style>
            tr:nth-child(even) {
                background-color: rgb(214, 222, 230);
            }

            tr:nth-child(odd) {
                background-color: rgb(250, 250, 250);
            }

        </style>

        <div class="flex-1  flex flex-col  shadow-sm rounded-md  ">

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                <div class="py-6" x-data="{ 
 'same_as_permanent' : false, 
 'permanent' : { 
 addr_line_1: '{{ json_decode($employee->permanent_address)->addr_line_1 }}', 
 addr_line_2: '{{ json_decode($employee->permanent_address)->addr_line_2 }}', 
 city: '{{ json_decode($employee->permanent_address)->city }}', 
 state: '{{ json_decode($employee->permanent_address)->state }}', 
 pincode: '{{ json_decode($employee->permanent_address)->pincode }}', 
 },
 'current' : { 
 addr_line_1: '{{ json_decode($employee->current_address)->addr_line_1 }}', 
 addr_line_2: '{{ json_decode($employee->current_address)->addr_line_2 }}', 
 city: '{{ json_decode($employee->current_address)->city }}', 
 state: '{{ json_decode($employee->current_address)->state }}', 
 pincode: '{{ json_decode($employee->current_address)->pincode }}', 
 },
 copyToCurrent: function() {
 return this.current = {...this.permanent}
 },
 }">
                    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
                        <div class="overflow-hidden shadow-sm sm:rounded-lg">

                            <div class="p-6 bg-glass border-b border-gray-200 backdrop-filter backdrop-blur-xl">



                                <h3 class="text-gray-900 text-4xl font-sm">Employee Update</h3>
                                <h5 class="text-blue-900 text-1xl font-sm">Blue Hex Software Pvt Limited</h5>
                                <form action="{{ route('admin.employees.update', ['employee' => $employee]) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')

                                    <div>

                                        @php
                                            $status = ['Active', 'Resigned', 'Sabbatical', 'Inactive', 'Terminated'];
                                        @endphp
                                        <div class="grid grid-cols-5 gap-6">
                                            <div class="my-6">
                                                <x-select type="text" label="Status" name="status">
                                                    @foreach ($status as $s)
                                                        <option value="{{ $s }}"
                                                            {{ $s === $employee->status ? 'selected' : '' }}>
                                                            {{ $s }}</option>
                                                    @endforeach
                                                </x-select>
                                            </div>
                                            <div class="my-6">
                                                <x-input type="text" label="First Name" name="first_name"
                                                    value="{{ $employee->first_name }}" />
                                            </div>
                                            <div class="my-6">
                                                <x-input type="text" label="Last Name" name="last_name"
                                                    value="{{ $employee->last_name }}" />
                                            </div>
                                            <div class="my-6">
                                                <x-input type="text" label="Middle Name" name="middle_name"
                                                    value="{{ $employee->middle_name }}" />
                                            </div>
                                            <div class="my-6">
                                                <x-input type="email" label="Personal Email Address"
                                                    name="personal_email" value="{{ $employee->personal_email }}" />
                                                <p class="text-gray-400 text-xs">Please enter personal email of the
                                                    employee.</p>
                                            </div>
                                            <div class="my-6">
                                                <x-input type="number" label="Phone Number" name="phone_number"
                                                    value="{{ $employee->phone_number }}" maxlength="10" />
                                            </div>
                                            <div class="my-6">
                                                <x-input type="text" label="Employee ID" name="emp_id"
                                                    value="{{ $employee->emp_id }}" />
                                            </div>
                                            <div class="my-6">
                                                <x-select type="text" label="Gender *" name="gender" required>
                                                    <option value="{{ $employee->gender }}">
                                                        {{ $employee->gender }}
                                                    </option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Other">Other</option>
                                                </x-select>
                                            </div>

                                            <div class="my-6">
                                                <x-input type="text" label="Date of Birth" name="date_of_birth"
                                                    value="{{ $employee->date_of_birth }}"
                                                    data-toggle="datepicker" />
                                            </div>
                                            <div class="my-6">
                                                <x-input type="text" label="Date of Joining" name="date_of_joining"
                                                    value="{{ $employee->date_of_joining }}"
                                                    data-toggle="datepicker" />
                                            </div>
                                            @php
                                                $desiginations = ['', 'HR Management', 'IT Admin', 'Finance Admin', 'Full Stack Developer', 'Full Stack Developer & Tech Support', 'Flutter Developer', 'Quality Analyst', 'Marketing/Sales', 'DevOps & s/w Developer', 'Product Manager', 'Project Manager', 'UI/UX Developer', 'Front End Developer', 'Founder', 'Co-Founder', 'Others'];
                                            @endphp
                                            <div class="my-6">
                                                <x-select type="text" label="Desigination" name="desigination">
                                                    @foreach ($desiginations as $d)
                                                        <option value="{{ $d }}"
                                                            {{ $d === $employee->desigination ? 'selected' : '' }}>
                                                            {{ $d }}</option>
                                                    @endforeach
                                                </x-select>
                                            </div>

                                            {{-- <div class="my-6">
										<x-input type="text" label="Desigination" name="desigination"
											value="{{ $employee->desigination }}"  />
									</div> --}}

                                            @php
                                                $types = ['Full Time', 'Intern', 'Contract'];
                                            @endphp

                                            @php
                                                $blood_groups = ['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB'];
                                            @endphp

                                            <div class="my-6">
                                                <x-select type="text" label="Employee Type" name="emp_type">
                                                    @foreach ($types as $t)
                                                        <option value="{{ $t }}"
                                                            {{ $t === $employee->emp_type ? 'selected' : '' }}>
                                                            {{ $t }}</option>
                                                    @endforeach
                                                </x-select>
                                            </div>

                                            <div class="my-6">
                                                <x-select type="text" label="Blood Group" name="blood_group">
                                                    @foreach ($blood_groups as $bg)
                                                        <option value="{{ $bg }}"
                                                            {{ $bg === $employee->blood_group ? 'selected' : '' }}>
                                                            {{ $bg }}</option>
                                                    @endforeach
                                                </x-select>
                                            </div>

                                            <div class="my-6">
                                                <x-input type="text" label="Aadhar" name="aadhar"
                                                    value="{{ $employee->aadhar }}" maxlength="10" />
                                            </div>
                                            <div class="my-6">
                                                <x-input type="text" label="PAN" name="pan"
                                                    value="{{ $employee->pan }}" maxlength="10" />
                                            </div>


                                        </div>
                                        <div class="grid grid-cols-1 gap-0">

                                            <div class="flex flex-col rounded-xl my-3">

                                                <h3 class="text-xl">Emeregency Contact </h3>
                                                <div class="grid grid-cols-3 gap-6">
                                                    <div class="my-6">
                                                        <x-input type="text" label="Name" name="emergency_contact_name"
                                                            value="{{ $employee->emergency_contact_name }}"
                                                            maxlength="20" />
                                                    </div>
                                                    <div class="my-6">
                                                        <x-input type="text" label="Number"
                                                            name="emergency_contact_number"
                                                            value="{{ $employee->emergency_contact_number }}"
                                                            maxlength="10" />
                                                    </div>
                                                    <div class="my-6">
                                                        <x-input type="text" label="Name" name="emergency_relationship"
                                                            value="{{ $employee->emergency_relationship }}"
                                                            maxlength="10" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="grid grid-cols-2 gap-6">
                                            <div class="flex flex-col rounded-xl my-3">
                                                <h3 class="text-xl">Permanent Address</h3>
                                                <div class="my-6">
                                                    <x-textarea label="permanent_address - Address Line 1 "
                                                        name="permanent_address[addr_line_1]"
                                                        x-model="permanent.addr_line_1" />
                                                </div>
                                                <div class="my-6">
                                                    <x-textarea label="Permanent Address - Address Line 2"
                                                        name="permanent_address[addr_line_2]"
                                                        x-model="permanent.addr_line_2" />
                                                </div>
                                                <div class="my-6">
                                                    <x-select label="Permanent Address - State"
                                                        name="permanent_address[state]" x-model.lazy="permanent.state">
                                                        @foreach ($states as $state)
                                                            <option value="{{ $state->name }}">{{ $state->name }}
                                                            </option>
                                                        @endforeach
                                                    </x-select>
                                                    {{-- <x-input type="text" label="current Address - State" name="current_address['state']" x-model.lazy="current.state"  /> --}}
                                                </div>
                                                <div class="my-6">
                                                    <x-input type="text" label="Permanent Address - City"
                                                        name="permanent_address[city]" x-model="permanent.city" />
                                                </div>
                                                <div class="my-6">
                                                    <x-input type="text" maxlength="6"
                                                        label="Permanent Address - Pincode"
                                                        name="permanent_address[pincode]" x-model="permanent.pincode" />
                                                </div>
                                            </div>

                                            <div class="flex flex-col rounded-xl my-3">
                                                <div class="flex items-center justify-between">
                                                    <h3 class="text-xl">Current Address</h3>
                                                    <span class="inline-flex space-x-1">
                                                        <x-small-button type="button" @click="copyToCurrent">Same as
                                                            Permanent
                                                        </x-small-button>
                                                    </span>
                                                </div>
                                                <div class="my-6">
                                                    <x-textarea label="Current Address - Address Line 1"
                                                        name="current_address[addr_line_1]"
                                                        x-model.lazy="current.addr_line_1" />
                                                </div>
                                                <div class="my-6">
                                                    <x-textarea label="Current Address - Address Line 2"
                                                        name="current_address[addr_line_2]"
                                                        x-model.lazy="current.addr_line_2" />
                                                </div>
                                                <div class="my-6">
                                                    <x-select label="Current Address - State"
                                                        name="current_address[state]" x-model.lazy="current.state">
                                                        @foreach ($states as $state)
                                                            <option value="{{ $state->name }}">{{ $state->name }}
                                                            </option>
                                                        @endforeach
                                                    </x-select>
                                                    {{-- <x-input type="text" label="current Address - State" name="current_address['state']" x-model.lazy="current.state"  /> --}}
                                                </div>
                                                <div class="my-6">
                                                    <x-input type="text" label="current Address - City"
                                                        name="current_address[city]" x-model.lazy="current.city" />
                                                </div>
                                                <div class="my-6">
                                                    <x-input type="text" maxlength="6" label="current Address - Pincode"
                                                        name="current_address[pincode]"
                                                        x-model.lazy="current.pincode" />
                                                </div>
                                            </div>

                                        </div>
                                        <div class="grid grid-cols-2 gap-6">
                                            <div class="flex flex-col rounded-xl my-3">
                                                <h3 class="text-xl">Bank Details </h3>
                                                <div class="my-6">
                                                    <x-input type="text" label="Bank" name="bank_account_bank"
                                                        value="{{ $employee->bank_account_bank }}" />
                                                </div>
                                                <div class="my-6">
                                                    <x-input type="text" label="Bank Account Number"
                                                        name="bank_account_number"
                                                        value="{{ $employee->bank_account_number }}" />
                                                </div>
                                                <div class="my-6">
                                                    <x-input type="text" label="Bank Account Name"
                                                        name="bank_account_name"
                                                        value="{{ $employee->bank_account_name }}" />
                                                </div>
                                                <div class="my-6">
                                                    <x-input type="text" label="Bank Account Branch"
                                                        name="bank_account_branch"
                                                        value="{{ $employee->bank_account_branch }}" />
                                                </div>
                                                <div class="my-6">
                                                    <x-input type="text" label="Bank Account IFSC"
                                                        name="bank_account_ifsc"
                                                        value="{{ $employee->bank_account_ifsc }}" />
                                                </div>
                                                <div class="my-6">
                                                    <x-input type="text" label="Bank Account MICR"
                                                        name="bank_account_micr"
                                                        value="{{ $employee->bank_account_micr }}" />
                                                </div>
                                                <div class="my-6">
                                                    <x-textarea type="textarea" label="Notes" name="notes">
                                                        {{ $employee->notes }}
                                                    </x-textarea>
                                                    <p class="text-gray-400 text-xs">
                                                    </p>
                                                </div>



                                            </div>


                                            <div class="flex flex-col rounded-xl my-3">

                                                <div>
                                                    @if ($employee->getMedia('profile_pic')->count() > 0)
                                                        <div class="my-6 w-64 h-auto">
                                                            <img src="{{ $employee->getMedia('profile_pic')->last()->getTemporaryUrl(\Carbon\Carbon::now()->addSeconds(30)) }}"
                                                                alt="" class="rounded-xl shadow-md" />
                                                        </div>
                                                    @endif
                                                    <div class="block overflow-hidden"
                                                        style="width: 190px; height: 220px;">
                                                        <x-input type="file" label="Upload Picture" name="profile_pic"
                                                            class="profile-input"
                                                            accept="image/png, image/jpeg, image/gif" />
                                                    </div>
                                                    <div class="my-6">
                                                        {{-- <x-input type="file" label="Signed Docs" /> --}}
                                                        <h3 class="text-gray-700 font-semibold text-sm">Signed Docs</h3>
                                                        <ul role="list" class="flex flex-wrap gap-3 items-center">
                                                            @foreach ($employee->getMedia('signed_docs') as $item)
                                                                <li class="relative">
                                                                    <div
                                                                        class="inline-flex my-3 flex-col items-center bg-glass rounded-xl px-3 py-3 hover:shadow-xl transition-shadow duration-300 cursor-pointer active:shadow-sm">
                                                                        {{-- <img src="https://images.unsplash.com/photo-1582053433976-25c00369fc93?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=512&q=80" alt="" class="object-cover pointer-events-none group-hover:opacity-75"> --}}
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            class="h-12 w-12" fill="none"
                                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                                            <path stroke-linecap="round"
                                                                                stroke-linejoin="round" stroke-width="2"
                                                                                d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                                                        </svg>
                                                                        <p
                                                                            class="mt-2 text-sm font-medium text-gray-900">
                                                                            {{ Str::limit($item->file_name, 15) }}
                                                                        </p>
                                                                        {{-- <p class="block text-sm font-medium text-gray-500 pointer-events-none">{{ $item->size }}</p> --}}

                                                                        <span
                                                                            class="inline-flex items-center space-x-3">
                                                                            <x-link-button color="green"
                                                                                href="{{ $item->getTemporaryUrl(\Carbon\Carbon::now()->addSeconds(30)) }}"
                                                                                target="_blank" class="mt-3">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    class="h-5 w-5" fill="none"
                                                                                    viewBox="0 0 24 24"
                                                                                    stroke="currentColor">
                                                                                    <path stroke-linecap="round"
                                                                                        stroke-linejoin="round"
                                                                                        stroke-width="2"
                                                                                        d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                                                </svg>
                                                                            </x-link-button>
                                                                            <x-link-button color="red"
                                                                                href="{{ route('delete-file', ['media' => $item->id]) }}"
                                                                                class="mt-3">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    class="h-5 w-5" fill="none"
                                                                                    viewBox="0 0 24 24"
                                                                                    stroke="currentColor">
                                                                                    <path stroke-linecap="round"
                                                                                        stroke-linejoin="round"
                                                                                        stroke-width="2"
                                                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                                </svg>
                                                                            </x-link-button>
                                                                        </span>
                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                        <x-input type="file" class="signed-docs" multiple
                                                            name="signed_docs[]" label="Upload Signed Documents" />
                                                    </div>

                                                    <div class="my-6">
                                                        <h3 class="text-gray-700 font-semibold text-sm">Other Docs</h3>

                                                        @if ($employee->getMedia('other_docs')->count() > 0)
                                                            <ul role="list" class="flex flex-wrap gap-3 items-center">
                                                                @foreach ($employee->getMedia('other_docs') as $item)
                                                                    <li class="relative">
                                                                        <div
                                                                            class="inline-flex my-3 flex-col items-center bg-glass rounded-xl px-3 py-3 hover:shadow-xl transition-shadow duration-300 cursor-pointer active:shadow-sm">
                                                                            {{-- <img src="https://images.unsplash.com/photo-1582053433976-25c00369fc93?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=512&q=80" alt="" class="object-cover pointer-events-none group-hover:opacity-75"> --}}
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                class="h-12 w-12" fill="none"
                                                                                viewBox="0 0 24 24"
                                                                                stroke="currentColor">
                                                                                <path stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    stroke-width="2"
                                                                                    d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                                                            </svg>
                                                                            <p
                                                                                class="mt-2 text-sm font-medium text-gray-900">
                                                                                {{ Str::limit($item->file_name, 15) }}
                                                                            </p>
                                                                            {{-- <p class="block text-sm font-medium text-gray-500 pointer-events-none">{{ $item->size }}</p> --}}

                                                                            <span
                                                                                class="inline-flex items-center space-x-3">
                                                                                <x-link-button color="green"
                                                                                    href="{{ $item->getTemporaryUrl(\Carbon\Carbon::now()->addSeconds(30)) }}"
                                                                                    target="_blank"
                                                                                    class="mt-3">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        class="h-5 w-5"
                                                                                        fill="none" viewBox="0 0 24 24"
                                                                                        stroke="currentColor">
                                                                                        <path stroke-linecap="round"
                                                                                            stroke-linejoin="round"
                                                                                            stroke-width="2"
                                                                                            d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                                                    </svg>
                                                                                </x-link-button>
                                                                                <x-link-button color="red"
                                                                                    href="{{ route('delete-file', ['media' => $item->id]) }}"
                                                                                    class="mt-3">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        class="h-5 w-5"
                                                                                        fill="none" viewBox="0 0 24 24"
                                                                                        stroke="currentColor">
                                                                                        <path stroke-linecap="round"
                                                                                            stroke-linejoin="round"
                                                                                            stroke-width="2"
                                                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                                    </svg>
                                                                                </x-link-button>
                                                                            </span>
                                                                        </div>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                        <x-input type="file" class="other-docs" multiple
                                                            name="other_docs[]" label="Upload Other Documents" />

                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                    <span class="flex items-center justify-center my-6 space-x-3 px-4 py-4">
                                        <x-button color="red">Submit</x-button>
                                        <x-link-button color="green" href=" {{ route('admin.employees.index') }}">
                                            Back
                                        </x-link-button>
                                    </span>



                                </form>

                            </div>
                        </div>
                    </div>
                </div>
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
                            FilePondPluginImagePreview,
                            // FilePondPluginImageCrop,
                            // FilePondPluginImageResize,
                            FilePondPluginImageTransform,
                            FilePondPluginImageEdit
                        );

                        const inputElement = document.querySelector('.signed-docs');
                        const otherElement = document.querySelector('.other-docs');

                        const pond = FilePond.create(inputElement, {
                            storeAsFile: true
                        });
                        const otherPond = FilePond.create(otherElement, {
                            storeAsFile: true
                        });
                        const profilePond = FilePond.create(document.querySelector('.profile-input'), {
                            storeAsFile: true,
                            labelIdle: `Drag & Drop your picture or <span class="filepond--label-action">Browse</span>`,
                            imagePreviewHeight: 170,
                            imageCropAspectRatio: '1:1',
                            // imageResizeTargetWidth: 200,
                            // imageResizeTargetHeight: 200,
                            stylePanelLayout: 'compact circle',
                            styleLoadIndicatorPosition: 'center bottom',
                            styleProgressIndicatorPosition: 'right bottom',
                            styleButtonRemoveItemPosition: 'left bottom',
                            styleButtonProcessItemPosition: 'right bottom',
                        });
                    </script>
                @endpush
        </div>
        </main>


    </div>
</x-app_admin>
