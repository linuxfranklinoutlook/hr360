<div class="py-3 relative">
	<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
		<div class="overflow-hidden shadow-xs sm:rounded-lg">
				<h3 class="text-gray-900 text-4xl font-sm">Add Roles</h3>
				<h5 class="text-blue-900 text-1xl font-sm">Blue Hex Software Pvt Limited</h5>
				<div class="my-4">
					<form method="POST" action="{{route('admin.roles.store')}}">
						@csrf
					<x-input label="Role" name="name" id="name" value="" ></x-input>
					<x-input label="Guard Name" name="guard_name" id="guard_name" value="" ></x-input>
					<x-button>Submit</x-button>
					</form>
				</div>
		</div>
	</div>
</div>
