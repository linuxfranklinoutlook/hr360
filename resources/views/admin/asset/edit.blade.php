<x-app_admin>
    @section('title')

        {{ Breadcrumbs::render('assets.show') }}

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
	<header class="justify-between items-center py-2 px-1  bg-gray-200 shadow-sm rounded-md ">
	   
	   
			{{ Breadcrumbs::render('assets.edit') }}
		
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
		<div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
			<div class="overflow-hidden shadow-xs sm:rounded-lg">
						
					<h3 class="text-gray-900 text-4xl font-sm">Edit Asset details </h3>
					<h5 class="text-blue-900 text-1xl font-sm">Blue Hex Software Pvt Limited</h5>
					 <form action="{{ route('admin.assets.update', ['asset' => $asset] ) }} " method="POST" enctype="multipart/form-data">
                        @csrf
						 @method('PATCH')
						 <div class="py-6 relative">
					<x-input type="text" label="Employee Name" value="{{ $asset->current_user}}"></x-input>

					
					<div class="grid grid-cols-2 gap-6">
						<div class="backdrop-filter backdrop-blur-lg px-3 py-3 rounded-md shadow my-3 ">
											<span class="flex items-center justify-between py-3  ">
												
												<h3 class="antialiased">Asset Information</h3>
												
											</span>

											


											<div class="my-6">
												<x-input type="text" label="Asset Tag *" name="asset_tag"
													value="{{ $asset->asset_tag }}" required />
											</div>
											<div class="my-6">
												<x-input type="text" label="Manufacturer " name="manufacturer"
													value="{{ $asset->manufacturer }}" />
											</div>
											<div class="my-6">
												<x-input type="text" label="Model " name="model"
													value="{{ $asset->model }}" />
											</div>
											<div class="my-6">
												<x-input type="text" label="Asset Type " name="asset_type"
													value="{{ $asset->asset_type }}" />
											</div>
											<div class="my-6">
												<x-input type="text" label="Asset Color " name="asset_color"
													value="{{ $asset->asset_color }}" />
											</div>
											<div class="my-6">
												<x-input type="text" label="Condition Notes " name="condition_notes"
													value="{{ $asset->condition_notes }}" />
											</div>
						</div>


						<div class="backdrop-filter backdrop-blur-lg px-3 py-3 rounded-md shadow my-3 ">
											<span class="flex items-center justify-between py-3  ">
												
												<h3 class="antialiased">Purchase Information</h3>
												
											</span>
											<div class="my-6">
												<x-input type="date" label="Purchase Date"  data-toggle="datepicker" name="purchase_date "
													value="{{ $asset->purchase_date }}"  />
											</div>
											<div class="my-6">
												<x-input type="text" label="Purchase Amount " name="purchase_amount"
													value="{{ $asset->purchase_amount }}" />
											</div>
											<div class="my-6">
												<x-input type="text" label="Order Number " name="order_number"
													value="{{ $asset->order_number }}" />
											</div>
											
											<h3 class="antialiased">User Information</h3>
											<div class="my-6">
												<x-input type="text" label="Current User " name="current_user" id="current_user" 
													 value="{{ $asset->current_user }}"/>
											</div>
											<div class="my-6">
												<x-input type="text" label="Previous User " name="previous_user"
													value="{{ $asset->previous_user }}" />
											</div>
											<div class="my-6">
												<x-input type="date" class="datepicker" label="Issued Date " data-toggle="datepicker" name="issued_date"
													value="{{ $asset->issued_date }}" />
											</div>
											<div class="my-6">
												<x-input type="date" label="Due Date " data-toggle="datepicker" name="due_date"
													value="{{ $asset->due_date }}" />
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
											
										@php
											$os_names=['Windows', 'Linux', 'Mac Os'];
										@endphp
  									<div class="my-6">
                                    <x-select type="text" label="Operating System" name="os_name" >
                                        @foreach ($os_names as $os)
                                            <option value="{{ $os }}"
                                                {{ $os === $asset->os_names ? 'selected' : '' }}>
                                                {{ $os }}</option>
                                        @endforeach
                                    </x-select>
                                	
											<div class="my-6">
												<x-input type="text" label="Host Name " name="host_name"
													value="{{$asset->host_name }}" />
											</div>
											<div class="my-6">
												<x-input type="text" label="Serial Number " name="serial_number"
													value="{{ $asset->serial_number }}" />
											</div>
											<div class="my-6">
												<x-select type="text" label="Physical Memory"  value="{{ old('physical_memory') }}" name="physical_memory">
													<option value="4 GB">4 GB</option>
													<option value="8 GB">8 GB</option>
													<option value="12 GB">12 GB</option>
													<option value="16 GB">16 GB</option>
												</x-select>
											</div>


											<div class="my-6">
												<x-input type="text" label="Processor " name="processor"
													value="{{ $asset->processor }}" />
											</div>
											

											<div class="my-6">
												<x-select type="text" label="Hard Disks"  value="{{ old('hard_disks') }}" name="hard_disks">
													<option value="128 GB">128 GB</option>
													<option value="256 GB">256 GB</option>
													<option value="512 GB">512 GB</option>
													<option value="1 TB">1 TB</option>
													<option value="2 TB">2 TB</option>
												</x-select>
											</div>

											<div class="my-6">
												<x-input type="text" label="Graphics Card" name="graphics_card"
													value="{{ $asset->graphics_card }}" />
											</div>
											<div class="my-6">
												<x-input type="text" label="Mac Address " name="mac_address"
													value="{{ $asset->mac_address }}" />
											</div>
											<div class="my-6">
												<x-select type="text" label="Enrollment Status with Desktop Central ME" name="enrolled_with_dcme">
													<option value="Yes">Yes</option>
													<option value="No">No</option>
												</x-select>
											</div>
									
											
				</div>	

						
											
											
					
					 	<div class="grid grid-cols-1 gap-6"> 
							 <span class="flex items-right justify-center my-3 space-x-3 px-4">
					<x-button 
						color="red">Update
						</x-button>	
					<x-link-button
					 color="blue" href="{{route('admin.assets.index')}}" bg-blue>Back</x-link-button>	</span>
						 </div> 
					 
				</div>
			</div>
	</div>
</div>
     </form>

