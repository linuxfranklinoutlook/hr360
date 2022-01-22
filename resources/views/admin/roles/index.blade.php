<x-app_admin>	
	@section('title')
	
	{{ Breadcrumbs::render('users') }}
	
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
 <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
	
	<div class="py-3 relative">
		<div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
			<div class="overflow-hidden shadow-xs sm:rounded-lg">
                    <h3 class="text-gray-900 text-4xl font-sm">Listing all Roles</h3>
                    <h5 class="text-blue-900 text-1xl font-sm">Blue Hex Software Pvt Limited</h5>
                    <div class="my-4">
						{{-- <x-link-button color="blue" onClick="Livewire.emit('openModal', 'create-new-user')">
							Create New
						 </x-link-button> --}}
						 
							<x-link-button color="blue" onClick="Livewire.emit('openModal', 'create-roles')">
							   Add Role
							</x-link-button>
							
                        {{-- <x-link-button color="blue" href="{{ route('admin.users.create') }}">Create
                        </x-link-button> --}}
                    </div>
                    
                    <div class="flex flex-col my-6">
							<div class="py-2 align-middle inline-block min-w-full sm:px-1 lg:px-2">
								<div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
									<table class="min-w-full divide-y divide-gray-200">
										<thead class="bg-gray-50">
                                            <tr class="whitespace-wrap">
                                                <th scope="col"
                                                    class=" px-6 py-3 text-left text-xs 	font-medium text-gray-900 uppercase tracking-wider">
                                                    Role ID
                                                </th>

                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                                   Roles
                                                </th>
												<th scope="col"
												class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
											   Guard Name
											</th>
                                                
                                                <th scope="col" >
                                                    <span class="sr-only">Edit</span>
                                                </th>
                                                <th scope="col" >
                                                    <span class="sr-only">Add Roles </span>
                                                </th>
												<th scope="col" >
                                                    <span class="sr-only">Delete </span>
                                                </th>
												<th scope="col" >
                                                    
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-300">
                                            @foreach ($roles as $role)
                                                <tr class="{{ $loop->index % 2 == 0 ? 'bg-glass' : 'bg-glass' }}">
                                                    <td
                                                        class="px-6 py-4 whitespace-wrap text-sm font-medium text-gray-900">
                                                        {{ $role->id }}
                                                    </td>

                                                   
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                                       
														    {{ $role->name }}
                                                    </td>
													<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                                       
														{{ $role->guard_name }}
												</td>
                                                   
                                                        

														<td class="px-1 py-1">
															<x-link-button color="green"
															   href="{{ route('admin.roles.edit', ['role' => $role->id]) }}">
															   Edit
															</x-link-button>
														 </td>
														

														<td class="px-1 py-1">
															<form action="{{ route('admin.roles.destroy', $role) }}"
																method="POST">
																@csrf
																@method('DELETE')
																<x-button color="red">Delete
																</x-button>
															 </form>
														
														 </td>
														

														
   
                                                       
                                                    
                                                </tr>
                                            @endforeach
                                            <!-- Odd row -->
                                            <!-- More people... -->
                                        </tbody>
                                    </table>
                                </div>
                                <div class="my-3">
                                    {{ $roles->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
</main>

</x-app_admin>


