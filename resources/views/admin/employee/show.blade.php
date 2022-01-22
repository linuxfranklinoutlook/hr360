<x-app_admin>	
	@section('title')
	
		{{ Breadcrumbs::render('employees.show') }}
	
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
	   
	   
			
<div class=" mt-4 flex-1 bg-glass 
 overflow-x-auto overflow-y-auto 
 max-w-8xl mx-auto sm:px-2 lg:px-6
  overflow-hidden shadow-sm sm:rounded-lg">
		<div class="container p-6"><h3 class="text-gray-900 text-4xl font-sm">Employee View </h3>
			<h5 class="text-blue-900 text-1xl font-sm">Blue Hex Software Pvt Limited</h5></div>
					<div class="backdrop-filter backdrop-blur-lg px-3 py-3 rounded-md shadow my-3 bg-gray-150">
						<span class="flex items-center justify-between py-3  ">
							<h3 class="text-2xl">{{ $employee->getFullName()  }}
								(Emp ID : {{ $employee->emp_id }}) {{ $employee->desigination}}</h3>
							{{-- <x-badge color="green">{{ $employee->emp_type }}</x-badge> --}}
					</div>
	
	
					@if ($employee->getMedia('profile_pic')->count() > 0)
						<div class="w-1/3 block">
							<img src="{{ $employee->getMedia('profile_pic')->last()->getTemporaryUrl(\Carbon\Carbon::now()->addMinutes(1)) }}"
								alt="" class="rounded-xl shadow-lg" />
						</div>
					@endif
	
					<!-- This example requires Tailwind CSS v2.0+ -->
	<div class="grid grid-cols-0 gap-2 ">
					<div class="bg-transparent overflow-hidden sm:rounded-lg mt-5">
						<div class="px-4 py-5 sm:px-6">
							<h3 class="text-lg leading-6 font-medium text-gray-900">
								Employee Information
								<span class="flex items-right justify-end my-1 space-x-1 px-1">
							<x-link-button color="blue" 
								href="{{ route('export_pdf', [$employee->id]) }}">ID Card</x-link-button>
						</span>
							</h3>
							<p class="mt-1 max-w-2xl text-l text-gray-500">
								Personal details and application.
							</p>
						</div>
					</div>
	
						<div class="backdrop-filter backdrop-blur-lg px-3 py-3 rounded-md shadow my-3  bg-white">
							{{-- <div class="px-4 py-5 sm:p-0"> --}}
							{{-- <dl class=""> --}}
	
								<div class="grid grid-cols-2 gap-2 ">
									
	
									<div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
										<dt class="text-sm font-medium text-gray-500">
											<strong> Employee Name </strong>
										</dt>
										<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
											{{ $employee->getFullName()  }}
										</dd>
	
										<dt class="text-sm font-medium text-gray-500">
											<strong> Email Address </strong>
										</dt>
										<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
											{{ $employee->personal_email }}
										</dd>
	
										<dt class="text-sm font-medium text-gray-500">
											<strong> Phone Number </strong>
										</dt>
										<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
											{{ $employee->phone_number }}
										</dd>
									</div>
								
								<div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
										<dt class="text-sm font-medium text-gray-500">
											<strong> Employment Type </strong>
										</dt>
										<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
											<x-badge color="green">{{ $employee->emp_type }}</x-badge>
										</dd>
	
										<dt class="text-sm font-medium text-gray-500">
											<strong> Location </strong>
										</dt>
										<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
											<x-badge color="blue">{{ $employee->location }}</x-badge>
										</dd>
	
										<dt class="text-sm font-medium text-gray-500">
											<strong> Employment Status </strong>
										</dt>
										<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
											<x-badge color="blue">{{ $employee->status }}</x-badge>
										</dd>
									</div>
									</div>
								
						</div>
	
	<div class="grid grid-cols-1 gap-1 ">
						<div class="backdrop-filter backdrop-blur-lg px-0 py-0 rounded-md shadow my-3  bg-blue-150">
							<div class="grid grid-cols-1 gap-1 ">
								
								<div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
									<dt class="text-sm font-medium text-gray-500">
										<strong> Present Address </strong>
									</dt>
									<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
										<div class="flex flex-col">
											<code>{{ json_decode($employee->current_address)->addr_line_1 }}</code>
											<code>{{ json_decode($employee->current_address)->addr_line_2 }}</code>
											<code>{{ json_decode($employee->current_address)->city }}</code>
											<code>{{ json_decode($employee->current_address)->state }}</code>
											<code>{{ json_decode($employee->current_address)->pincode }}</code>
										</div>
									</dd>
								</div>
								<div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
									<dt class="text-sm font-medium text-gray-500">
										<strong> Permanent Address </strong>
									</dt>
									<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
										<div class="flex flex-col">
											<code>{{ json_decode($employee->permanent_address)->addr_line_1 }}</code>
											<code>{{ json_decode($employee->permanent_address)->addr_line_2 }}</code>
											<code>{{ json_decode($employee->permanent_address)->city }}</code>
											<code>{{ json_decode($employee->permanent_address)->state }}</code>
											<code>{{ json_decode($employee->permanent_address)->pincode }}</code>
										</div>
									</dd>
								</div>
							</div>
						</div>
	
						
					
						<div class="backdrop-filter backdrop-blur-lg px-3 py-3 rounded-md shadow my-3  bg-white">
							
								<div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
									<dt class="text-sm font-medium text-gray-500">
										<strong> Date Of Birth </strong>
									</dt>
									<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
										<code>{{ $employee->date_of_birth }}
									</dd>
								</div>
								<div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
									<dt class="text-sm font-medium text-gray-500">
										<strong> Date Of Join </strong>
									</dt>
									<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
										<code>{{ $employee->date_of_joining }}
									</dd>
								</div>
								<div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
									<dt class="text-sm font-medium text-gray-500">
										<strong> Reliving Date </strong>
									</dt>
									<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
										<code>{{ $employee->date_of_joining }}
									</dd>
								</div>
								<div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-0 sm:px-6">
									<dt class="text-sm font-medium text-gray-500">
										<strong> Blood Group </strong>
									</dt>
									<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
										<code>{{ $employee->blood_group }}
									</dd>
								</div>
								<div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-0 sm:px-6">
									<dt class="text-sm font-medium text-gray-500">
										<strong> Gender </strong>
									</dt>
									<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
										<code>{{ $employee->gender }}
									</dd>
								</div>
								
						</div>
						   
	
							<div class="backdrop-filter backdrop-blur-lg px-3 py-3 rounded-md shadow my-3  bg-blue-150">
								<div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
									<dt class="text-sm font-medium text-gray-500">
										<strong> Emergency Contact </strong>
									</dt>
								
	
									<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
										<div class="flex flex-col">
											Contact Name 
													{{ $employee->emergency_contact_name }}
											<span>Relationship  &nbsp&nbsp
													{{ $employee->emergency_relationship }}</span>
											<span>Contact Number  
													{{ $employee->emergency_contact_number }}</span>
										</div>
									</dd>
								</div>
								
												   
								
						 </div>
	
						<div class="backdrop-filter backdrop-blur-lg px-3 py-3 rounded-md shadow my-3  bg-white ">
								<div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-0 sm:px-6">
									<dt class="text-sm font-medium text-gray-500">
										<strong> Aadhar Number </strong>
									</dt>
									<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
										<code>{{ $employee->aadhar }}
									</dd>
								</div>
								<div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-0 sm:px-6">
									<dt class="text-sm font-medium text-gray-500">
										<strong> PAN Number </strong>
									</dt>
									<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
										<code>{{ $employee->pan }}
									</dd>
								</div>
								
								<div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
									<dt class="text-sm font-medium text-gray-500">
										<strong> Bank Information </strong>
									</dt>
									<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
										<div class="flex flex-col">
											<code>Bank Name   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp {{ $employee->bank_account_bank }}</code>
											<code>Account Holder &nbsp&nbsp&nbsp{{ $employee->bank_account_name }}</code>
											<code>Branch  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp{{ $employee->bank_account_branch }}</code>
											<code>Account Number &nbsp&nbsp {{ $employee->bank_account_number }}</code>
											<code>IFSC Code &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp {{ $employee->bank_account_ifsc }}</code>
											<code>MICR Code &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp {{ $employee->bank_account_micr }}</code>
										</div>
									</dd>
								</div>
								<div	div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
									<dt class="text-sm font-medium text-gray-500">
										<strong> Notes </strong>
									</dt>
									<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
										{{ $employee->notes }} 	
									</dd>
								</div>
							
								
						</div>
						
						
	</div>
	
						<div class="backdrop-filter backdrop-blur-lg  px-3 py-3 rounded-md shadow my-3  bg-blue-150">
					
							<div class="grid grid-cols-1 gap-3 ">
								<div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
									<dt class="text-sm font-medium text-gray-500">
										<strong> Site Access Email </strong>
									</dt>
									<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
										{{ $employee->user->email }} <span class="text-red-500">( Contact Admin to
											update this )</span>
									</dd>
									@foreach ($assets as $asset )
					@if ($asset->employee_id == $employee->id)
	
					<dt class="text-sm font-medium text-gray-500">
										<strong> {{ $employee->getFullName()}} Is using  </strong>
									</dt>
									<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
									   {{$asset->asset_type}} : {{ $asset->model }} Serial Number : {{$asset->serial_number}} Asset Tag : {{$asset->asset_tag}}<span class="text-red-500"></span>
									</dd> 
					@endif
					
								   
					
					@endforeach
								</div>
							</div>
						</div>
						
	
							
	
						
	
						{{-- <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
										<dt class="text-sm font-medium text-gray-500">
											Salary expectation
										</dt>
										<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
											$120,000
										</dd>
									</div> --}}
						
	
						@if ($employee->getMedia('signed_docs')->count() > 0)
							<div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
								<dt class="text-sm font-medium text-gray-500">
									<strong> Signed Docs </strong>
								</dt>
								<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
									<div class="flex flex-col">
										@foreach ($employee->getMedia('signed_docs') as $item)
											<x-link target="_blank"
												href="{{ $item->getTemporaryUrl(\Carbon\Carbon::now()->addSeconds(30)) }}">
												{{ $item->file_name }}</x-link>
										@endforeach
									</div>
								</dd>
							</div>
						@endif
	
						@if ($employee->getMedia('other_docs')->count() > 0)
							<div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
								<dt class="text-sm font-medium text-gray-500">
									<strong> Other Docs </strong>
								</dt>
								<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
									<div class="flex flex-col">
										@foreach ($employee->getMedia('other_docs') as $item)
											<x-link target="_blank"
												href="{{ $item->getTemporaryUrl(\Carbon\Carbon::now()->addSeconds(30)) }}">
												{{ $item->file_name }}</x-link>
										@endforeach
										
									</div>
								</dd>
							</div>
						@endif
						{{-- <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
										<dt class="text-sm font-medium text-gray-500">
											Attachments
										</dt>
										<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
											<ul role="list" class="border border-gray-200 rounded-md divide-y divide-gray-200">
												<li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
													<div class="w-0 flex-1 flex items-center">
														<!-- Heroicon name: solid/paper-clip -->
														<svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
															<path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
														</svg>
														<span class="ml-2 flex-1 w-0 truncate">
															resume_back_end_developer.pdf
														</span>
													</div>
													<div class="ml-4 flex-shrink-0">
														<a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
															Download
														</a>
													</div>
												</li>
												<li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
													<div class="w-0 flex-1 flex items-center">
														<!-- Heroicon name: solid/paper-clip -->
														<svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
															<path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
														</svg>
														<span class="ml-2 flex-1 w-0 truncate">
															coverletter_back_end_developer.pdf
														</span>
													</div>
													<div class="ml-4 flex-shrink-0">
														<a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
															Download
														</a>
													</div>
												</li>
											</ul>
										</dd>
									</div> --}}
						</dl> 
					</div>
					
					<span class="flex items-center justify-center my-6 space-x-3 px-4 py-4">
							<x-link-button color="red"
								href="{{ route('admin.employees.edit', ['employee' => $employee->id]) }}">Edit</x-link-button>
								<x-link-button color="green" 
								href=" {{ route('admin.employees.index')}}">Back</x-link-button>
							
						</span>
						
	</div>
</div>
</div>


</x-app_admin>
					

	