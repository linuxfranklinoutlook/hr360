<x-app-layout>

	<x-slot name="breadcrumbs">
		{{ Breadcrumbs::render('salary') }}
	</x-slot>

	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Salary Management') }}
		</h2>
	</x-slot>
	
	<div class="py-6 relative">
		<div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
			<div class="overflow-hidden shadow-xs sm:rounded-lg">
				<div class="p-6 card">
					<h3 class="text-4xl">Listing all Employee Salary Structure</h3>

					<div class="my-4">
						<x-link-button color="blue" onClick="Livewire.emit('openModal', 'salary-create-structure')">Create New </x-link-button>
						{{-- <x-link-button color="blue" href="{{ route('salary.create') }}">Create</x-link-button> --}}
					</div>

					<form action="" method="GET">
						<div class="flex items-center space-x-3 flex-wrap gap-2">
							<span class="flex-1">
								<x-input type="text" name="query" placeholder="Search via First Name, Last Name, Employee id, department, desigination " label="Search For Employee" />
							
							<x-button>Filter</x-button>
							<x-link-button color="red" href="{{ route('salary.index') }}">Clear Filters</x-link-button>
							</span>
						</div>
							
							 

						
					
					<div class="flex flex-col my-6">
						<div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
							<div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
								<div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
									<table class="min-w-full divide-y divide-gray-200">
										<thead class="bg-gray-50">
											<tr>
												<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
													Employee Name
												</th>
												<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
													Employee ID
												</th>
												<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
													Basic
												</th>
												<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
													CTC
												</th>
												<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
													Date of Join
												</th>
												
												<th scope="col" class="relative px-6 py-3">
													<span class="sr-only">Edit</span>
												</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($salary_data  as $data )
												
												<tr class="{{ $loop->index % 2 == 0 ? 'bg-glass' : 'bg-glass' }}">
													<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
														{{ $data->employee->getFullName()  }}
													</td>
													<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
														<x-link href="{{ route('salary.show',['salary'=>$data->id]) }}">{{ $data->employee->emp_id }}</x-link>
													</td>
													
														 
													
													<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
														{{ $data->basic }}
													</td>
													
													<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
														{{ $data->ctc }}
													</td>
													<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
														{{ $data->employee->date_of_joining }}
													</td>
													
													<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
														<a href="{{ route('salary.edit', ['salary' => $data->id]) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
													</td>
												</tr>
											@endforeach
										</tbody>
									</table>
								</div>

								<div class="my-3">
									{{ $salary_data->links() }}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</x-app-layout>
