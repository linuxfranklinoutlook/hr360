<nav x-data="{ open: false }" class="bg-glass relative border-b border-gray-600 border-opacity-30">
    <!-- Primary Navigation Menu -->
    <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex justify-between">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />

                    </a>
                </div>


                <style>
                    /* since nested groupes are not supported we have to use 
                   regular css for the nested dropdowns 
                */
                    li>ul {
                        transform: translatex(100%) scale(0)
                    }

                    li:hover>ul {
                        transform: translatex(101%) scale(1)
                    }

                    li>button svg {
                        transform: rotate(-90deg)
                    }

                    li:hover>button svg {
                        transform: rotate(-270deg)
                    }

                    /* Below styles fake what can be achieved with the tailwind config
                   you need to add the group-hover variant to scale and define your custom
                   min width style.
                     See https://codesandbox.io/s/tailwindcss-multilevel-dropdown-y91j7?file=/index.html
                     for implementation with config file
                */
                    .group:hover .group-hover\:scale-100 {
                        transform: scale(1)
                    }

                    .group:hover .group-hover\:-rotate-180 {
                        transform: rotate(180deg)
                    }

                    .scale-0 {
                        transform: scale(0)
                    }

                    .min-w-32 {
                        min-width: 16rem
                    }

                </style>


                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">



                    <!-- component -->





                    {{-- <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                   {{ __('Dashboard') }}

                </x-nav-link> --}}

                    <div class="group inline-block p-5">
                        <span class="pr-1  ">Employee Management</span>
                        <span>
                            <svg class="fill-current h-4 w-5 transform group-hover:-rotate-180
                              transition duration-150 ease-in-out"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </span>
                        <ul
                            class="bg-blue border rounded-sm transform scale-0 group-hover:scale-100 absolute 
                        transition duration-150 ease-in-out origin-top min-w-40">

                            <li class="rounded-sm relative px-3 py-1 hover:bg-gray-100">
                                <button class="w-full text-left flex items-center outline-none focus:outline-none">
                                    <span class="pr-1 flex-2">Employee Management</span>
                                    <span class="mr-auto">
                                        <svg class="fill-current h-4 w-4
                                  transition duration-150 ease-in-out"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path
                                                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                        </svg>
                                    </span>
                                </button>
                                <ul
                                    class="bg-blue border rounded-sm absolute top-0 right-0 
                        transition duration-150 ease-in-out origin-top-left
                        min-w-32
                        ">
                                    <li class="rounded-sm relative px-3 py-1 hover:bg-gray-100"><a
                                            href="{{ route('assets.index') }}">Asset Management</a></li>
                                    <li class="px-3 py-1 hover:bg-gray-100"><a
                                            href="{{ route('employees.index') }}">Employees</a></li>
                                    <li class="rounded-sm relative px-3 py-1 hover:bg-gray-100">
                                        <button
                                            class="w-full text-left flex items-center outline-none focus:outline-none">
                                            <span class="pr-1 flex-1">Salary</span>
                                            <span class="mr-auto">
                                                <svg class="fill-current h-4 w-4
                                      transition duration-150 ease-in-out"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path
                                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                                </svg>
                                            </span>
                                        </button>

                                        <ul
                                            class="bg-blue border rounded-sm absolute top-0 right-0 
                            transition duration-150 ease-in-out origin-top-left
                            min-w-32
                            ">

                                            <li class="px-3 py-1 hover:bg-gray-100"><a
                                                    href="{{ route('salary.index') }}">Salary Structures</a></li>
                                            <li class="px-3 py-1 hover:bg-gray-100"><a
                                                    href="{{ route('payslip.index') }}">Payrolls</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>



                    <div class="group inline-block p-5">
                        <a href="">

                            <span class="pr-1  ">Leave/Attendance Management</span></>
                            <span>
                                <svg class="fill-current h-4 w-4 transform group-hover:-rotate-180
                               transition duration-150 ease-in-out"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path
                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </span>
                            </button>
                            <ul
                                class="bg-blue border rounded-sm transform scale-0 group-hover:scale-100 absolute 
                         transition duration-150 ease-in-out origin-top min-w-32">

                                <li class="rounded-sm relative px-3 py-1 hover:bg-gray-100">
                                    <button class="w-full text-left flex items-center outline-none focus:outline-none">
                                        <span class="pr-1 flex-1">Attendance</span>
                                        <span class="mr-auto">
                                            <svg class="fill-current h-4 w-4
                                   transition duration-150 ease-in-out"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path
                                                    d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                            </svg>
                                        </span>
                                    </button>
                                    <ul
                                        class="bg-blue border rounded-sm absolute top-0 right-0 
                         transition duration-150 ease-in-out origin-top-left
                         min-w-32
                         ">
                                        <li class="px-3 py-1 hover:bg-gray-100"><a
                                                href="{{ route('attendance.index') }}">Attendance Management</a></li>
                                        <li class="rounded-sm relative px-3 py-1 hover:bg-gray-100">
                                            <button
                                                class="w-full text-left flex items-center outline-none focus:outline-none">
                                                <span class="pr-1 flex-1"><a
                                                        href="{{ route('leave.index') }}">Leave Management</a></span>
                                            </button>
                                        </li>

                                    </ul>

                            </ul>
                        </a>
                    </div>


                    <div class="group inline-block p-5">
                        <span class="pr-1  ">Project Management</span></>
                        <span>
                            <svg class="fill-current h-4 w-4 transform group-hover:-rotate-180
                               transition duration-150 ease-in-out"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </span>
                        </button>
                        <ul
                            class="bg-blue border rounded-sm transform scale-0 group-hover:scale-100 absolute 
                         transition duration-150 ease-in-out origin-top min-w-32">

                            <li class="rounded-sm relative px-3 py-1 hover:bg-gray-100">
                                <button class="w-full text-left flex items-center outline-none focus:outline-none">
                                    <span class="pr-1 flex-1">Projects</span>
                                    <span class="mr-auto">
                                        <svg class="fill-current h-4 w-4
                                   transition duration-150 ease-in-out"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path
                                                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                        </svg>
                                    </span>
                                </button>

                                <ul
                                    class="bg-blue border rounded-sm absolute top-0 right-0 
                         transition duration-150 ease-in-out origin-bottom-left
                         min-w-100
                         ">
                                    <li class="px-3 py-1 px-1 hover:bg-gray-100"><a
                                            href="{{ route('clients.index') }}">Client Management</a></li>
                                    <li class="px-3 py-1 px-1 hover:bg-gray-100"><a
                                            href="{{ route('projects.index') }}">Project Management</a></li>
                                    <li class="px-3 py-1 px-1 hover:bg-gray-100"><a
                                            href="{{ route('tasks.index') }}">Task Management</a></li>
                            </li>
                        </ul>
                    </div>


                    <div class="group inline-block p-5">
                        <a href="">
                            <span class="pr-1  "><a href="{{ route('lms.index') }}">Learning</a></span></>

                    </div>





                    {{-- <x-nav-link :href="route('lms.index')" :active="request()->routeIs('lms.*')">
                   {{ __('Learning') }}
                </x-nav-link>
                <x-nav-link :href="route('employees.index')" :active="request()->routeIs('employees.*')">
                   {{ __('Employee') }}
                </x-nav-link>.
                <x-nav-link :href="route('assets.index')" :active="request()->routeIs('assets.*')">
                   {{ __('Company Asset') }}
                </x-nav-link>
                <x-nav-link :href="route('salary.index')" :active="request()->routeIs('salary.*')">
                   {{ __('Salary structure') }}
                </x-nav-link>
                <x-nav-link :href="route('payslip.index')" :active="request()->routeIs('payslip.*')">
                   {{ __('Payroll') }}
                </x-nav-link>
                <x-nav-link :href="route('leave.index')" :active="request()->routeIs('leave.*')">
                   {{ __('Leave') }}
                </x-nav-link>
                <x-nav-link :href="route('attendance.index')" :active="request()->routeIs('leave.*')">
                   {{ __('Attendance') }}
                </x-nav-link>
                <x-nav-link :href="route('tasks.index')" :active="request()->routeIs('tasks.*')">
                   {{ __('Tasks') }}
                </x-nav-link>
                <x-nav-link :href="route('projects.index')" :active="request()->routeIs('projects.*')">
                   {{ __('Projects') }}
                </x-nav-link>
                <x-nav-link :href="route('clients.index')" :active="request()->routeIs('clients.*')">
                   {{ __('Clients') }}
                </x-nav-link> --}}
                </div>
            </div>






            <!-- Settings Dropdown -->
            <div class="group inline-block p-5">
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="flex items-center text-sm font-medium text-gray-800 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
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

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('lms.index')" :active="request()->routeIs('lms.index')">
                {{ __('Learning') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('employees.index')" :active="request()->routeIs('lms.index')">
                {{ __('Employee') }}
            </x-responsive-nav-link>


        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
