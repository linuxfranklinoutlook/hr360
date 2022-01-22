<x-app-layout>      
	<x-slot name="breadcrumbs">
        {{ Breadcrumbs::render('salary.edit') }}
    </x-slot>
	<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Salary Structure	') }}
        </h2>
    </x-slot>
	<div class="p-6">
	  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-glass backdrop-filter backdrop-blur-xl">
		  
                    <h3 class="text-xl">Edit  Salary Record for {{$salary->employee->getFullName()}} ( {{$salary->employee->emp_id}} )</h3>

                    @if ($errors->any())
                        <x-validation-error :errors="$errors" />
                    @endif 

                    <form action="{{  route('salary.update', ['salary' => $salary] ) }}" method="POST" enctype="multipart/form-data">
                        @csrf
						 @method('PATCH')
							

										
										
										
                        	<div class="grid grid-cols-2 gap-6 " >
                            	
									<div class="backdrop-filter backdrop-blur-lg px-3 py-3 rounded-md shadow my-3 ">
										<span class="flex items-center justify-between py-3  ">
											
											<h3 class="antialiased">Earnings</h3>
											{{-- <a href="#">
												<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
												</svg>
											</a> --}}
										</span>
										<div class="my-6">
											<x-input type="number" step=".01" label="Cost to the Company" name="ctc"
												value="{{ $salary->ctc }}"  maxlength="10"/>
										</div>
										<div class="my-6">
											<x-input type="number" step=".01" label="Basic" name="basic"
												value="{{ $salary->basic }}"  maxlength="10"/>
										</div>
										<div class="my-6">
											<x-input type="number" step=".01" label="HRA" name="hra"
												value="{{ $salary->hra }}" />
										</div>
										<div class="my-6">
											<x-input type="number" step=".01" label="Medical" name="medical"
												value="{{ $salary->medical }}"  />
										</div>
										<div class="my-6">
											<x-input type="number" step=".01" label="Boradband" name="broadband"
												value="{{ $salary->broadband }}"  />
											
											</p>
										</div>
										
									</div>
                            	


								<div class="backdrop-filter backdrop-blur-lg px-3 py-3 rounded-md shadow my-3">
									<span class="flex items-center justify-between py-3">
										<h3 class="antialiased">Deduction</h3>
										<a href="#">
											<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
												viewBox="0 0 24 24" stroke="currentColor">
												<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
													d="M19 9l-7 7-7-7" />
											</svg>
										</a>
									</span>
									
									<div class="my-6">
										<x-input type="number" step=".01" label="Professional Tax" name="pt"
											value="{{ $salary->pt }}"   />
									</div>
									
									<div class="my-6">
										<x-input type="text" label="notes" name="notes"
											value="{{ $salary->notes }}"   />
											
									</div>
								</div>
								
							</div> 
						
						
						<span class="flex items-right justify-center my-3 space-x-3 px-4">
						<x-button 
						color="red">Update
						</x-button>
						
						<x-link-button
					 	color="blue" href="{{route('salary.index')}}" bg-blue>Back</x-link-button>
						</span>
                	</div>
				</form>
				
				
	
	
              
               		 
						
            </div>
			
						
    	</div>
</div>
</x-app-layout>						
