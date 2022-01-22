<x-app-layout>
    <x-slot name="breadcrumbs">
        {{ Breadcrumbs::render('salary.show') }}
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Salary  Management- Viewing Salary : ' . $salary->employee->getFullName()) }}
        </h2>
    </x-slot>
    <div class="py-6 relative">
        <div class="max-w-7xl mx-auto sm:px-9 lg:px-8 ">

            <div class="p-12 bg-glass backdrop-filter backdrop-blur-xl bg-white">
                <div class="backdrop-filter backdrop-blur-lg px-3 py-3 rounded-md shadow my-3 bg-white ">
                    <div class="overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-12 bg-glass backdrop-filter backdrop-blur-xl">
                            <div class="backdrop-filter backdrop-blur-lg px-3 py-3 rounded-md shadow my-3 ">
                                <span class="flex items-center justify-between py-3  ">
                                    <h3 class="text-3xl">Salary Structure for {{ $salary->employee->getFullName() }}
                                    </h3>
                                    {{-- <x-badge color="green">{{ $employee->emp_type }}</x-badge> --}}
                            </div>

                        </div>
                        <div class="grid grid-cols-1 gap-2 ">
                            <div
                                class="backdrop-filter backdrop-blur-lg px-3 py-3 rounded-md shadow my-3  bg-white text-justify">
                                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <strong>Fixed Allowances</strong>
                                </div>
                                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">

                                    <dt class="text-sm font-medium text-gray-500">
                                        <strong> Basic </strong>
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{ $salary->basic }}
                                    </dd>
                                    <dt class="text-sm font-medium text-gray-500">
                                        <strong> HRA </strong>
                                    </dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{ $salary->hra }}
                                    </dd>
                                </div>
                            </div>
                            <div
                                class="backdrop-filter backdrop-blur-lg px-3 py-3 rounded-md shadow my-3  bg-white text-justify">
                                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <strong>Allowances</strong>
                                </div>
                                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    <strong> Medical </strong>
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $salary->medical }}
                                </dd>
                                <dt class="text-sm font-medium text-gray-500">
                                    <strong> Broadband </strong>
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $salary->broadband }}
                                </dd>
                                </div>
                            </div>

                        </div>
                        <div  class="backdrop-filter backdrop-blur-lg px-3 py-3 rounded-md shadow my-3  bg-white text-justify">
                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <strong>Deductions</strong>
                            </div>
                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                
                                <dt class="text-sm font-medium text-gray-500">
                                    <strong>Proffesional Tax</strong>
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $salary->pt }}
                                </dd>
                                
                            </div>
                        </div>
                    </div>
                    <div
                        class="backdrop-filter backdrop-blur-lg px-3 py-3 rounded-md shadow my-3  bg-white text-justify ">
                        <div class="grid grid-cols-2 gap-3 ">
                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    <strong>Gross</strong>
                                </dt>

                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $salary->gross_pay }}
                                </dd>
                            
                                <dt class="text-sm font-medium text-gray-500">
                                    <strong>Net Pay</strong>
                                </dt>

                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $salary->net_pay }}
                                </dd>
                            </div>
                                
                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    <strong> NOTES</strong>
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $salary->notes }}
                                </dd>
                            </div>

                            <span class="flex justify-end my-2 space-x-1 px-1 bg-auto">
                                <x-link-button color="black"
                                    href="{{ route('salary.edit', ['salary' => $salary->id]) }}">Edit
                                </x-link-button>
                                <x-link-button color="blue" href=" {{ route('salary.index') }}">Back
                                </x-link-button>

                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>

</x-app-layout>
