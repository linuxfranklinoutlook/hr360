<x-app_admin>	
	@section('title')
	
	{{ Breadcrumbs::render('users') }}
	
	@endsection
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
		<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
			<div class="overflow-hidden shadow-xs sm:rounded-lg">
                    <h3 class="text-gray-900 text-4xl font-sm">Edit  Desigination</h3>
                    <h5 class="text-blue-900 text-1xl font-sm">Blue Hex Software Pvt Limited</h5>
                    <div class="my-4">
   

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form method="POST" action="{{ route('admin.desiginations.update', $desigination) }}">
            @csrf
			@method('PATCH')
			<div class="flex flex-col my-6">
			<div class="flex flex-col my-6 align-middle inline-block min-w-full	bg-white shadow-md px-4 sm:px-6 md:px-8 lg:px-10 py-8 rounded-3xl w-80
				max-w-md
			  "
			>
			  {{-- <div class="font-medium self-center text-xl sm:text-2xl text-gray-800">
				Blue Hex Software
			  </div> --}}
			  <div class="mt-4 self-center text-xl sm:text-sm sm:text-2xl text-gray-800">
				Edit Desigination
			  </div>
	  
			  <div class="mt-5">
				  <div class="flex flex-col mb-5">
					  <label
					  for="name"
					  class="mb-1 text-xs tracking-wide text-gray-900"
					  >Desigination</label
					>
					
					<div class="relative">
					  <div
						class="
						  inline-flex
						  items-center
						  justify-center
						  absolute
						  left-0
						  top-0
						  h-full
						  w-10
						  text-gray-400
						"
					  >
						<i class="fas fa-at text-blue-500"></i>
					  </div>
	  
					  <input
						id="name"
						type="text"
						name="name"
						value="{{$desigination->name}}"
						class="
						  text-sm
						  placeholder-gray-500
						  pl-10
						  pr-4
						  rounded-2xl
						  border border-gray-400
						  w-full
						  py-2
						  focus:outline-none focus:border-blue-400
						"
						placeholder="Enter your Name"
					  />
					</div>
				  </div>
				  <div class="mt-5">
					
			  
						<span>
						  <i class="fas fa-lock text-blue-500"></i>
						</span>
					  </div>
	  
					  

	  
				  <div class="flex w-full">
					<button
					  type="submit"
					  class="
						flex
						mt-2
						items-center
						justify-center
						focus:outline-none
						text-white text-sm
						sm:text-base
						bg-gray-600
						hover:bg-blue-600
						rounded-2xl
						py-2
						w-full
						transition
						duration-150
						ease-in
					  "
					>
					  <span class="mr-2 uppercase ">Update Desigination</span>
					  <span>
						<svg
						  class="h-6 w-6"
						  fill="none"
						  stroke-linecap="round"
						  stroke-linejoin="round"
						  stroke-width="2"
						  viewBox="0 0 24 24"
						  stroke="currentColor"
						>
						  <path
							d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"
						  />
						</svg>
					  </span>
					</button>
				  </div>
				</form>
					</div>
			</div>
		</div>
	</div>
 </main>
</x-app_admin>


