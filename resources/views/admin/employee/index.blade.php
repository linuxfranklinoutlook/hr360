<x-app_admin>	
	@section('title')
	
	{{ Breadcrumbs::render('employees') }}
	
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
    <main class="flex-1 overflow-x-auto overflow-y-auto bg-gray-50 ">

        <div class="py-3 relative">
		<div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
			<div class="overflow-hidden shadow-xs sm:rounded-lg">
                <h3 class="text-gray-900 text-4xl font-sm">Listing all Employees</h3>
                <h5 class="text-blue-900 text-1xl font-sm">Blue Hex Software Pvt Limited</h5>
                <div class="my-4">
                    <x-link-button color="blue" href="{{ route('admin.employees.create') }}">Add Employee
                    </x-link-button>
					<x-link-button color="red" href="{{ route('admin.desiginations.index') }}">Desigination
                    </x-link-button>
					
					
                </div>
                <form action="" method="GET">
                    <div class="flex items-center space-x-1 flex-wrap">
                        <span class="flex-3">
                            <x-input type="text" name="query"
                                placeholder="Search via First Name, Last Name, Email or Phone Number"
                                label="Search For Employees" />
                        </span>
                        <span class="flex-3">
                            <x-select label="Type" name="emp_type">
                                @foreach ($emp_types as $type)
                                    <option value="{{ $type }}"
                                        {{ request('emp_type') === $type ? 'selected' : '' }}>{{ $type }}
                                    </option>
                                @endforeach
                            </x-select>
                        </span>
                        <span class="flex-3">
                            <x-select label="Location" name="location">
                                @foreach ($emp_locations as $loc)
                                    <option value="{{ $loc }}"
                                        {{ request('location') === $loc ? 'selected' : '' }}>{{ $loc }}
                                    </option>
                                @endforeach
                            </x-select>
                        </span>
                        <span class="flex-3">
                            <x-select label="Status" name="status">
                                <option value="active">Active</option>
                                <option value="resigned">Resigned</option>
                                <option value="sabbatical">Sabbatical</option>
                            </x-select>
                        </span>
                    </div>
                    <div class="my-3">
                        <x-button>Filter</x-button>
                        <x-link-button color="red" href="{{ route('admin.employees.index') }}">Clear Filters
                        </x-link-button>
                    </div>
					
                </form>
			</div>
		</div>
			

                <div class="flex flex-col my-6">
                    
                        <div class="py-2 align-middle inline-block min-w-full sm:px-1 lg:px-2">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr class="whitespace-wrap">
                                            <th scope="col"
                                                class=" px-6 py-3 text-left text-xs 	font-medium text-gray-900 uppercase tracking-wider">
                                                Employee Name
                                            </th>

                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                                Email
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                                EMPID
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                                Phone
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                                Type
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                                Desigination
                                            </th>
                                            <th scope="col">
                                                <span class="sr-only">Edit</span>
                                            </th>
                                            <th scope="col">
                                                <span class="sr-only">Print PDF </span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-300">
                                        @foreach ($employees as $emp)
                                            <tr class="{{ $loop->index % 2 == 0 ? 'bg-glass' : 'bg-glass' }}">
                                                <td class="px-6 py-4 whitespace-wrap text-sm font-medium text-gray-900">
                                                    {{ $emp->getFullName() }}
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    <x-link href="{{ $emp->path() }}">
                                                        <strong>{{ $emp->personal_email }}</strong>
                                                    </x-link>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                                    {{ $emp->emp_id }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                                    {{ $emp->phone_number }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                                    {{ $emp->emp_type }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-wrap text-sm text-gray-700">
                                                    {{ $emp->desigination }}

                                                </td>



                                                <td class="px-1 py-1">
                                                    <x-link-button color="black"
                                                        href="{{ route('admin.employees.edit', ['employee' => $emp->id]) }}">
                                                        Edit
                                                    </x-link-button>
                                                </td>

                                                <td class="px-1 py-1">
                                                    <x-link-button color="green"
                                                        href="{{ route('export_pdf', [$emp->id]) }}">
                                                        PDF
                                                    </x-link-button>
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
	</main>
</div>
</x-app_admin>
