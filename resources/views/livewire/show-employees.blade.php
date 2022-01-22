<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
	<x-input type="text" placeholder="Search" wire:model="query" label="Search Employees" />
	<x-button type="button" class="mt-3" wire:click="searchSubmit">Search</x-button>
	<div class="flex flex-col my-6">
		<div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
			<div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
				<div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
					<table class="min-w-full divide-y divide-gray-200">
						<thead class="bg-gray-50">
							<tr>
								<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
									First Name
								</th>
								<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
									Last Name
								</th>
								<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
									Email
								</th>
								<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
									EMPID
								</th>
								<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
									Phone Number
								</th>
								<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
									Type
								</th>
								<th scope="col" class="relative px-6 py-3">
									<span class="sr-only">Edit</span>
								</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($employees as $emp)
								<tr class="{{ $loop->index % 2 == 0 ? 'bg-glass' : 'bg-glass' }}">
									<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
										{{ $emp->first_name }}
									</td>
									<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
										{{ $emp->last_name }}
									</td>
									<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
										<x-link href="{{ $emp->path() }}">{{ $emp->personal_email }}</x-link>
									</td>
									<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
										{{ $emp->emp_id }}
									</td>
									<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
										{{ $emp->phone_number }}
									</td>
									<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
										{{ $emp->emp_type }}
									</td>
									<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
										<a href="{{ route('employees.edit', ['employee' => $emp->id]) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
									</td>
								</tr>
							@endforeach
							<!-- Odd row -->
							<!-- More people... -->
						</tbody>
					</table>
				</div>

				<div class="my-3">
					{{ $employees->links() }}
				</div>
			</div>
		</div>
	</div>
</div>
