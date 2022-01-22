<x-app_admin>
    @section('title')

        {{ Breadcrumbs::render('assets.show') }}

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
            <div class="py-6 relative">
                <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
                    <div class="overflow-hidden shadow-xs sm:rounded-lg">

                        <h3 class="text-gray-900 text-4xl font-sm">Viewing Asset - {{ $asset->model }}
                            , Current user : {{ $asset->current_user }} </h3>
                        <h5 class="text-blue-900 text-1xl font-sm">Blue Hex Software Pvt Limited</h5>

                    </div>
                    <div
                        class="backdrop-filter backdrop-blur-lg px-3 py-3 rounded-md shadow my-3  bg-blue-150 items-center">
                        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-2 sm:gap-8 sm:px-6 ">

                            <table class="min-w-full divide-y divide-gray-600">
                                <thead class="bg-gray-300">
                                    <tr>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            Title
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            Description
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="px-5 py-5 border-b border-gray-200  text-sm">
                                            <div class="flex items-center">

                                                <div class="ml-3">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        <strong> Asset Tag </strong>
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $asset->asset_tag }}</p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                            <div class="flex items-center">

                                                <div class="ml-3">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        <strong>Current User</strong>
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $asset->current_user }}
                                            </p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                            <div class="flex items-center">

                                                <div class="ml-3">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        <strong> Model</strong>
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $asset->model }}</p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                            <div class="flex items-center">

                                                <div class="ml-3">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        <strong>Manufacturer</strong>
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $asset->manufacturer }}</p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                            <div class="flex items-center">

                                                <div class="ml-3">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        <strong>Asset Type</strong>
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $asset->asset_type }}</p>
                                        </td>
                                    </tr>


                                    <tr>
                                        <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                            <div class="flex items-center">

                                                <div class="ml-3">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        <strong>Asset Color</strong>
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $asset->asset_color }}</p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                            <div class="flex items-center">

                                                <div class="ml-3">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        <strong> Serial Number </strong>
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $asset->serial_number }}
                                            </p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                            <div class="flex items-center">

                                                <div class="ml-3">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        <strong> Purchase date </strong>
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $asset->purchase_date }}
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                            <div class="flex items-center">

                                                <div class="ml-3">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        <strong> Purchase Amount </strong>
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $asset->purchase_amount }}
                                            </p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                            <div class="flex items-center">

                                                <div class="ml-3">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        <strong> Order Number </strong>
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $asset->order_number }}
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                            <div class="flex items-center">

                                                <div class="ml-3">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        <strong>Due Date </strong>
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $asset->due_date }}</p>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>






                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            Title
                                        </th>
                                        <th
                                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                            Description
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                            <div class="flex items-center">

                                                <div class="ml-3">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        <strong> Host Name </strong>
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $asset->host_name }}</p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                            <div class="flex items-center">

                                                <div class="ml-3">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        <strong>Processor</strong>
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $asset->processor }}</p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                            <div class="flex items-center">

                                                <div class="ml-3">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        <strong> Operating System</strong>
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $asset->os_name }}</p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                            <div class="flex items-center">

                                                <div class="ml-3">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        <strong>Physical Memory</strong>
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $asset->physical_memory }}</p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                            <div class="flex items-center">

                                                <div class="ml-3">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        <strong>Hard Disks</strong>
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $asset->hard_disks }}</p>
                                        </td>
                                    </tr>


                                    <tr>
                                        <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                            <div class="flex items-center">

                                                <div class="ml-3">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        <strong>Graphic Cards</strong>
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $asset->graphics_card }}
                                            </p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                            <div class="flex items-center">

                                                <div class="ml-3">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        <strong> Mac Address </strong>
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $asset->mac_address }}
                                            </p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                            <div class="flex items-center">

                                                <div class="ml-3">
                                                    <p class="text-gray-900 whitespace-wrap">
                                                        <strong> Enrollment with Desktop Central Manage Engine Status
                                                        </strong>
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $asset->enrolled_with_dcme }}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                            <div class="flex items-center">

                                                <div class="ml-3">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        <strong> Issued Date </strong>
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $asset->issued_date }}
                                            </p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                            <div class="flex items-center">

                                                <div class="ml-3">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        <strong> Previous User </strong>
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $asset->previous_user }}
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                            <div class="flex items-center">

                                                <div class="ml-3">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        <strong>Condition Notes </strong>
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $asset->condition_notes }}</p>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div grid grid-cols=2>

                    <span class="flex items-center justify-center my-6 space-x-3 px-4 py-4">
                        <x-link-button color="red" href="{{ route('admin.assets.edit', ['asset' => $asset->id]) }}">
                            Edit</x-link-button>
                        <x-link-button color="green" href=" {{ route('admin.assets.index') }}">Back</x-link-button>
                    </span>
                </div>
            </div>
    </div>

    </div>
    </div>

</x-app_admin>
