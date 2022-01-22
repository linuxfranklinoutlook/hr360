          <div class="p-6">
	<h3 class="text-2xl">Create Salary Structure</h3> <div class="overflow-hidden shadow-sm sm:rounded-lg">
                

                    @if ($errors->any())
                        <x-validation-error :errors="$errors" />
                    @endif

                    <form action="{{ route('salary.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
							

										<x-select label="Employee Name" name="id"
										 onchange="document.getElementById('employee_id').value=this.options[this.selectedIndex].value;">	
													//    document.getElementById('full_name').value=this.options[this.selectedIndex].text;">
                                            @foreach ($employee as $emp)
                                                <option value="{{ $emp->id }}">{{ $emp->getFullName() }}
												</option>
                                            @endforeach
                                        </x-select> 

										<label>Note: Basic & HRA will be calculated automatically</label>

										<input type="hidden" value="" id="employee_id" name="employee_id">
										 {{-- <input type="" value="" id="full_name" name="full_name"> --}}
										
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
												value="{{ old('ctc') }}"  maxlength="10"/>
										</div>
										<div class="my-6">
											<x-input type="number" step=".01" label="Basic" name="basic"
												value="{{ old('basic') }}"  maxlength="10"/>
										</div>
										<div class="my-6">
											<x-input type="number" step=".01" label="HRA" name="hra"
												value="{{ old('hra') }}" />
										</div>
										<div class="my-6">
											<x-input type="number" step=".01" label="Medical" name="medical"
												value="{{ old('medical') }}"  />
										</div>
										<div class="my-6">
											<x-input type="number" step=".01" label="Boradband" name="broadband"
												value="{{ old('broadband') }}"  />
											
											</p>
										</div>
										{{-- <div class="my-6">
											<x-input type="number" label="Other Allowances" name="other_allowances"
												value="{{ old('other_allowances') }}" maxlength="10"  />
										</div> --}}
										
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
											value="{{ old('pt') }}"   />
									</div>
								
									<div class="my-6">
										<x-input type="text" label="notes" name="notes"
											value="{{ old('notes') }}"   />
											
									</div>
								</div>
								
							</div> 
						
							
						<span class="flex items-right justify-center my-3 space-x-3 px-4">
						<x-button >Submit</x-button>
						</span>
                </div>
				
				
	
	
              
               		 </form>
						
            </div>
			
						
    	</div>
