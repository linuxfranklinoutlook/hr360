<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Employee Management - Viewing Employee : ' .$employee->getFullName() ) }}
		</h2>
	</x-slot>
	
	<div class="py-6">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="overflow-hidden shadow-xl sm:rounded-lg">
				<div class="p-6 bg-glass">
					<div class="flex items-center justify-between px-4">
						<h3 class="text-3xl">{{ $employee->getFullName() }} ({{ $employee->emp_id }})</h3>
						{{-- <x-badge color="green">{{ $employee->emp_type }}</x-badge> --}}
					</div>

					<span class="flex items-center justify-end my-3 space-x-3 px-4">
						<x-link-button color="blue" href="{{ route('employees.edit', ['employee' => $employee->id]) }}">Edit</x-link-button>
						{{-- <x-link-button href="{{ route('employees.destroy', ['employee' => $employee->id]) }}">Delete</x-link-button> --}}
					</span>
					<span class="flex items-center justify-end my-3 space-x-3 px-4">
						<x-link-button color="blue" href="{{ '/employees/destroy/' . $employee->id }}">Delete</x-link-button>
					</span>


					@if($employee->getMedia('profile_pic')->count() > 0)
					<div class="w-1/3 block">
						<img src="{{ $employee->getMedia('profile_pic')->last()->getTemporaryUrl(\Carbon\Carbon::now()->addMinutes(1)) }}" alt="" class="rounded-xl shadow-lg" />
					</div>
					@endif
					
					<!-- This example requires Tailwind CSS v2.0+ -->
					<div class="bg-transparent overflow-hidden sm:rounded-lg mt-6">
						<div class="px-4 py-5 sm:px-6">
							<h3 class="text-lg leading-6 font-medium text-gray-900">
								Employee Information
							</h3>
							<p class="mt-1 max-w-2xl text-sm text-gray-500">
								Personal details and application.
							</p>
						</div>
						<div class="px-4 py-5 sm:p-0">
							<dl class="">
								<div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
									<dt class="text-sm font-medium text-gray-500">
										Employment Type
									</dt>
									<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
										<x-badge color="green">{{ $employee->emp_type }}</x-badge>
									</dd>
								</div>
								<div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
									<dt class="text-sm font-medium text-gray-500">
										Location
									</dt>
									<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
										<x-badge color="blue">{{ $employee->location }}</x-badge>
									</dd>
								</div>
								<div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
									<dt class="text-sm font-medium text-gray-500">
										Employment Status
									</dt>
									<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
										<x-badge color="blue">{{ $employee->status }}</x-badge>
									</dd>
								</div>
								<div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
									<dt class="text-sm font-medium text-gray-500">
										Full name
									</dt>
									<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
										{{ $employee->getFullName() }}
									</dd>
								</div>
								<div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
									<dt class="text-sm font-medium text-gray-500">
										Email Address
									</dt>
									<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
										{{ $employee->personal_email }}
									</dd>
								</div>
								<div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
									<dt class="text-sm font-medium text-gray-500">
										Phone Number
									</dt>
									<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
										<code>{{ $employee->phone_number }}
									</dd>
								</div>
								<div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
									<dt class="text-sm font-medium text-gray-500">
										Site Access Email
									</dt>
									<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
										{{ $employee->user->email }} <span class="text-red-500">( Contact Admin to update this )</span>
									</dd>
								</div>
								{{-- <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
									<dt class="text-sm font-medium text-gray-500">
										Salary expectation
									</dt>
									<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
										$120,000
									</dd>
								</div> --}}
								<div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
									<dt class="text-sm font-medium text-gray-500">
										Permanent Address
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
								<div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
									<dt class="text-sm font-medium text-gray-500">
										Current Address
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
										Bank Information
									</dt>
									<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
										<div class="flex flex-col">
											<code>{{ $employee->bank_account_bank }}</code>
											<code>{{ $employee->bank_account_name }}</code>
											<code>{{ $employee->bank_account_branch }}</code>
											<code>{{ $employee->bank_account_number }}</code>
											<code>{{ $employee->bank_account_ifsc }}</code>
										</div>
									</dd>
								</div>

								@if($employee->getMedia('signed_docs')->count() > 0)
								<div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
									<dt class="text-sm font-medium text-gray-500">
										Signed Docs
									</dt>
									<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
										<div class="flex flex-col">
											@foreach ($employee->getMedia('signed_docs') as $item)
												<x-link target="_blank" href="{{ $item->getTemporaryUrl(\Carbon\Carbon::now()->addSeconds(30)) }}">{{ $item->file_name }}</x-link>	
											@endforeach
										</div>
									</dd>
								</div>
								@endif
								
								@if($employee->getMedia('other_docs')->count() > 0)
								<div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
									<dt class="text-sm font-medium text-gray-500">
										Other Docs
									</dt>
									<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
										<div class="flex flex-col">
											@foreach ($employee->getMedia('other_docs') as $item)
												<x-link target="_blank" href="{{ $item->getTemporaryUrl(\Carbon\Carbon::now()->addSeconds(30)) }}">{{ $item->file_name }}</x-link>	
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
					</div>
				
					
				
					
				</div>
				
			</div>
			
		</div>
		
	</div>
	
</x-app-layout>
