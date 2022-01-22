<x-app_admin></x-app_admin>

<div class="flex-1  flex flex-col  shadow-sm rounded-md  ">
	<header class="justify-between items-center py-2 px-1  bg-gray-200 shadow-sm rounded-md ">
	   
	   
			{{ Breadcrumbs::render('assets.create') }}
		
	</header> 
	<style>
		tr:nth-child(even) {
			background-color: rgb(214, 222, 230);
		}
		tr:nth-child(odd) {
			background-color: rgb(250, 250, 250);
		}
	</style>
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
	<div class="py-6 relative">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="overflow-hidden shadow-xs sm:rounded-lg">
						
					<h3 class="text-gray-900 text-4xl font-sm">Add Asset </h3>
					<h5 class="text-blue-900 text-1xl font-sm">Blue Hex Software Pvt Limited</h5>
                    <form action="{{ route('admin.assets.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf




                        <div class="my-6">
                            <x-select type="text" label="Select Employee" name="employee_id" onchange="document.getElementById('current_user').value=this.options[this.selectedIndex].text;
            document.getElementById('employee_id').value=this.options[this.selectedIndex].value;">

                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->getFullName() }}</option>
                                @endforeach
                            </x-select>
                            <input type="hidden" name="employee_id" id="employee_id">
                        </div>

                        <div class="grid grid-cols-2 gap-6">
                            <div class="backdrop-filter backdrop-blur-lg px-3 py-3 rounded-md shadow my-3 ">
                                <span class="flex items-center justify-between py-3  ">

                                    <h3 class="antialiased">Asset Information</h3>

                                </span>




                                <div class="my-6">
                                    <x-input type="text" label="Asset Tag *" name="asset_tag"
                                        value="{{ old('asset_tag') }}" required />
                                </div>
                                <div class="my-6">
                                    <x-input type="text" label="Manufacturer " name="manufacturer"
                                        value="{{ old('manufacturer') }}" />
                                </div>
                                <div class="my-6">
                                    <x-input type="text" label="Model " name="model" value="{{ old('model') }}" />
                                </div>
                                <div class="my-6">
                                    <x-input type="text" label="Asset Type " name="asset_type"
                                        value="{{ old('asset_type') }}" />
                                </div>
                                <div class="my-6">
                                    <x-input type="text" label="Asset Color " name="asset_color"
                                        value="{{ old('asset_color') }}" />
                                </div>
                                <div class="my-6">
                                    <x-input type="text" label="Condition Notes " name="condition_notes"
                                        value="{{ old('condition_notes') }}" />
                                </div>
                            </div>


                            <div class="backdrop-filter backdrop-blur-lg px-3 py-3 rounded-md shadow my-3 ">
                                <span class="flex items-center justify-between py-3  ">

                                    <h3 class="antialiased">Purchase Information</h3>

                                </span>
                                <div class="my-6">
                                    <x-input type="date" label="Purchase Date" data-toggle="datepicker"
                                        name="purchase_date " value="{{ old('purchase_date') }}" />
                                </div>
                                <div class="my-6">
                                    <x-input type="text" label="Purchase Amount " name="purchase_amount"
                                        value="{{ old('purchase_amount') }}" />
                                </div>
                                <div class="my-6">
                                    <x-input type="text" label="Order Number " name="order_number"
                                        value="{{ old('order_number') }}" />
                                </div>

                                <h3 class="antialiased">User Information</h3>
                                <div class="my-6">
                                    <x-input type="text" label="Current User " name="current_user" id="current_user" />
                                </div>
                                <div class="my-6">
                                    <x-input type="text" label="Previous User " name="previous_user"
                                        value="{{ old('previous_user') }}" />
                                </div>
                                <div class="my-6">
                                    <x-input type="date" label="Issued Date " data-toggle="datepicker"
                                        name="issued_date" value="{{ old('issued_date') }}" />
                                </div>
                                <div class="my-6">
                                    <x-input type="date" label="Due Date " data-toggle="datepicker" name="due_date"
                                        value="{{ old('due_date') }}" />
                                </div>
                            </div>
                        </div>

                        <div class="backdrop-filter backdrop-blur-lg px-3 py-3 rounded-md shadow my-3 ">
                            <span class="flex items-center justify-between py-3  ">

                                <h3 class="antialiased">System Information</h3>
                                {{-- <a href="#">
													<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
														<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
													</svg>
												</a> --}}
                            </span>


                            <div class="my-6">
                                <x-select type="text" label="Operating System" value="{{ old('os_name') }}"
                                    name="os_name">
                                    <option value="Windows">Windows</option>
                                    <option value="Linux">Linux</option>
                                    <option value="Mac OS">Mac OS</option>
                                </x-select>
                            </div>
                            <div class="my-6">
                                <x-input type="text" label="Host Name " name="host_name"
                                    value="{{ old('host_name') }}" />
                            </div>
                            <div class="my-6">
                                <x-input type="text" label="Serial Number " name="serial_number"
                                    value="{{ old('serial_number') }}" />
                            </div>
                            <div class="my-6">
                                <x-select type="text" label="Physical Memory" value="{{ old('physical_memory') }}"
                                    name="physical_memory">
                                    <option value="4 GB">4 GB</option>
                                    <option value="8 GB">8 GB</option>
                                    <option value="12 GB">12 GB</option>
                                    <option value="16 GB">16 GB</option>
                                </x-select>
                            </div>


                            <div class="my-6">
                                <x-input type="text" label="Processor " name="processor"
                                    value="{{ old('processor') }}" />
                            </div>


                            <div class="my-6">
                                <x-select type="text" label="Hard Disks" value="{{ old('hard_disks') }}"
                                    name="hard_disks">
                                    <option value="128 GB">128 GB</option>
                                    <option value="256 GB">256 GB</option>
                                    <option value="512 GB">512 GB</option>
                                    <option value="1 TB">1 TB</option>
                                    <option value="2 TB">2 TB</option>
                                </x-select>
                            </div>

                            <div class="my-6">
                                <x-input type="text" label="Graphics Card" name="graphics_card"
                                    value="{{ old('graphics_card') }}" />
                            </div>
                            <div class="my-6">
                                <x-input type="text" label="Mac Address " name="mac_address"
                                    value="{{ old('mac_address') }}" />
                            </div>
                            <div class="my-6">
                                <x-select type="text" label="Enrollment Status with Desktop Central ME"
                                    name="enrolled_with_dcme">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </x-select>
                            </div>


                        </div>
                        <x-button>Submit</x-button>
                    </form>

                </div>
            </div>
        </div>
    </div>

