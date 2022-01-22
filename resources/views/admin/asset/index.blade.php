<x-app_admin>	
	@section('title') 
	
	{{  Breadcrumbs::render('assets') }}
	
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

<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
	
	<div class="py-3 relative">
		<div class="max-w-8xl mx-auto sm:px-2 lg:px-4">
			<div class="overflow-hidden shadow-xs sm:rounded-lg">
						
					<h3 class="text-gray-900 text-4xl font-sm">Listing all Assets</h3>
					<h5 class="text-blue-900 text-1xl font-sm">Blue Hex Software Pvt Limited</h5>

					<div class="my-4">
						<x-link-button color="blue" href="{{ route('admin.assets.create') }}">Create</x-link-button>
					</div>

					<form action="" method="GET">
						<div class="flex items-center space-x-3 flex-wrap gap-2">
							<span class="flex-1">
								<x-input type="text" name="query" placeholder="Search via Model, Asset id, Asset Types, Serial numbers or OS " label="Search For Assets" />
							
							<x-button>Search</x-button>
							<x-link-button color="red" href="{{ route('admin.assets.index') }}">Clear</x-link-button>
							</span>
						</div>
							
							

						
					
					<div class="flex flex-col my-6">
						<div class="-my-2 overflow-x-auto sm:-mx-2 lg:-mx-4">
							<div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
								<div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
									<table class="min-w-full divide-y divide-gray-200">
										<thead class="bg-gray-50">
											<tr>
												<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
													Asset Tag
												</th>
												<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
													Model
												</th>
												<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
													Serial Number
												</th>
												<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
													Current User
												</th>
												
												<th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
													Operating Systems
												</th>
												<th scope="col" class="px-6 py-3 whitespace-wrap text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
													Enrolled with DC-ME
												</th>
												<th scope="col" class="relative px-6 py-3">
													<span class="sr-only">Edit</span>
												</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($assets as $asset)
												<tr class="{{ $loop->index % 2 == 0 ? 'bg-glass' : 'bg-glass' }}">
													<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
														{{ $asset->asset_tag }}
													</td>
													<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
														{{ $asset->model }}
													</td>
													<td class="px-6 py-4 whitespace-wrap text-sm text-gray-900">
														<x-link href="{{ $asset->path() }}">{{ $asset->serial_number }}</x-link>
													</td>
													<td class="px-3 py-1 whitespace-wrap text-sm text-gray-900">
														{{ $asset->current_user }}
													</td>
													
													<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
														{{ $asset->os_name }}
													</td>
														<td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-900">
														{{ $asset->enrolled_with_dcme }}
													</td>
													<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
														<a href="{{ route('admin.assets.edit', ['asset' => $asset->id]) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
													</td>
												</tr>
											@endforeach
											<!-- Odd row -->
											<!-- More people... -->
										</tbody>
									</table>
								</div>

								<div class="my-3">
									{{ $assets->links() }}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</x-app_admin>
