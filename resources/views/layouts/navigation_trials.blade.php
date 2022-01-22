<div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200">
	<div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false"
		class="fixed z-30 inset-0 bg-black opacity-50 transition-opacity lg:hidden"></div>

	<div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'"
		class="fixed z-30 inset-y-0 left-0 w-80 transition duration-300 transform bg-gray-900 overflow-y-auto lg:translate-x-0 lg:static lg:inset-0">
		<div class="flex items-center justify-center mt-6">
			<div class="flex items-center">
				<svg class="h-15 w-10" viewBox="0 0 512 512" fill="none" xmlns="http://www.w3.org/2000/svg">
					
					<a href="/dashboard_test">
						<img src="{{ asset('images/logo.png') }} " width="90" height="90" style="vertical-align:top" alt="Blue Hex Software"/>
					</a>

				</svg>
				<br>
			</div>
		</div>
		<div class="flex items-center justify-center mt-6">
			<div class="flex items-center">
				<span class="text-white text-1xl mx-2 font-bold"><a href="/dashboard_test">Blue Hex Software Pvt Limited</a></span>
			</div>
		</div>
		<div class="group inline-block p-2 flex items-center justify-center mt-2 text-white ">
			<div class="hidden sm:flex sm:items-center sm:ml-6">
			   <x-dropdown align="center" width="52">
				  <x-slot name="trigger">
					 <button
						class="flex items-center text-l font-medium bg-gray-900 text-white hover:text-white hover:border-gray-900 focus:outline-none focus:text-red-500 focus:border-gray-900 transition duration-150 ease-in-out">
						<div>{{ Auth::user()->name }}</div>
  
						<div class="ml-1">
						   <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
							  <path fill-rule="evenodd"
								 d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
								 clip-rule="evenodd" />
						   </svg>
						</div>
					 </button>
  
  
				  </x-slot>
  
				  <x-slot name="content">
					 <!-- Authentication -->
					 <form method="POST" action="{{ route('logout') }}">
						@csrf
  
						<x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
												  this.closest('form').submit();">
						   {{ __('Log Out') }}
						</x-dropdown-link>
					 </form>
				  </x-slot>
			   </x-dropdown>
			</div>
		   </div>

		<nav class="mt-10">
			<a class="flex items-center mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-gray-100"
				href="/dashboard_test">
				<svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
					stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
						d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
						d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
				</svg>

				<span class="mx-3">Dashboard</span>

			</a>

			<a class="flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100"
				href="{{ route('admin.employees.index') }}">
				<svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
					stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
						d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z">
					</path>
				</svg>

				<span class="mx-3">Employees</span>
			</a>

			<a class="flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100"
				href="{{ route('admin.assets.index') }}">
				<svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
					stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
						d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
					</path>
				</svg>

				<span class="mx-3">Assets</span>
			</a>

			<a class="flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100"
				href="{{ route('admin.salary.index') }}">
				<svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
					stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
						d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
					</path>
				</svg>

				<span class="mx-3">Salary Management</span>
			</a>
			<a class="flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100"
				href="{{ route('admin.payslip.index') }}">
				<svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
					stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
						d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
					</path>
				</svg>

				<span class="mx-3">Payrolls</span>
			</a>
			<a class="flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100"
				href="{{ route('admin.projects.index') }}">
				<svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
					stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
						d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z">
					</path>
				</svg>

				<span class="mx-3">Project Management</span>
			</a>
			<a class="flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100"
				href="{{ route('admin.clients.index') }}">
				<svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
					stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
						d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z">
					</path>
				</svg>

				<span class="mx-3">Client Management</span>
			</a>


			
			<a class="flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100"
				href="{{ route('admin.tasks.index') }}">
				<svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
					stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
						d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z">
					</path>
				</svg>

				<span class="mx-3">Task Management</span>
			</a>
			<a class="flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100"
				href="{{ route('admin.attendance.index') }}">
				<svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
					stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
						d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
					</path>
				</svg>
				<span class="mx-3">Attendance</span>
			</a>
			<a class="flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100"
				href="{{ route('admin.leave.index') }}">
				<svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
					stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
						d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
					</path>
				</svg>
				<span class="mx-3"> Leave Management</span>
			</a>
			<a class="flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100"
				href="{{ route('lms.index') }}">
				<svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
					stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
						d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
					</path>
				</svg>
				<span class="mx-3"> Learning</span>
			</a>
			<a class="flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100"
				href="/login">
				<svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
					stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
						d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
					</path>
				</svg>
				<span class="mx-3"> Logout</span>
			</a>
			

		</div>
		
		</nav>
	
	
	
