<x-app-layout>
   <x-slot name="breadcrumbs">
      {{ Breadcrumbs::render('projects') }}
   </x-slot>

   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         {{ __('Projects') }}
      </h2>
   </x-slot>

   <div class="py-6 relative">
      <div class="max-w-9xl mx-auto sm:px-4 lg:px-4 sm:rounded-lg">
         <div class="overflow-hidden shadow-xs sm:rounded-lg">
            <div class="p-4 card">
               <h3 class="text-4xl">List of Projects</h3>
               <div class="my-4">
                  <x-link-button color="blue" onClick="Livewire.emit('openModal', 'create-project-livewire')">
                     Create New
                  </x-link-button>
                  {{-- <x-link-button color="blue" href="{{ route('projects.create') }}">Create New </x-link-button> --}}
               </div>
               <form action="" method="GET">
                  <div class="flex items-center space-x-3 flex-wrap gap-2">
                     <span class="flex-1">
                        <x-input type="text" name="query"
                           placeholder="Search Projects via Project Name, Project manager, requested by, task type"
                           label="Search For Tasks" />
                        <x-button>Filter</x-button>
                        <x-link-button color="red" href="{{ route('projects.index') }}">Clear Filters
                        </x-link-button>
                     </span>
                  </div>
               </form>


               <div class="flex flex-col my-6 sm:rounded-lg">
                  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 sm:rounded-lg">
                     <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8 sm:rounded-lg">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                           <div class="p-2 bg-glass backdrop-filter backdrop-blur-xl  sm:rounded-lg text-center">
                              <h1>Listing all Projects </h1>
                           </div>

                           <div class="container flex justify-center mx-auto p-6  sm:rounded-lg">
                              <div class="flex flex-col">
                                 <div class="w-min">
                                    <div class="border-b border-gray-200 shadow  sm:rounded-lg">
                                       <table class="divide-y divide-gray-300 ">
                                          <thead class="bg-gray-700 ">
                                             <tr>


                                                <th class="px-6 py-2 text-xm text-white">
                                                   Project Name
                                                </th>
                                                <th class="px-6 py-2 text-xm text-white">
                                                   Description
                                                </th>
                                                <th class="px-6 py-2 text-xm text-white">
                                                   Requested on
                                                </th>
                                                <th class="px-6 py-2 text-xm text-white">
                                                   Requested by
                                                </th>
                                                <th class="px-6 py-2 text-xm text-white">
                                                   Deployed on Staging
                                                </th>
                                                <th class="px-6 py-2 text-xm text-white">
                                                   Deployed on Production
                                                </th>
                                                <th class="px-6 py-2 text-xm text-white">
                                                   Completed on
                                                </th>
                                                <th class="px-6 py-2 text-xm text-white">
                                                   Current Status
                                                </th>

                                                <th class="px-6 py-2 text-xm text-white">

                                                </th>
                                                <th class="px-6 py-2 text-xm text-white">

                                                </th>




                                             </tr>
                                          </thead>

                                          <tbody class="bg-white divide-y divide-gray-300">
                                             @foreach ($projects as $project)
                                                <form action="{{ route('projects.edit', $project->id) }}"
                                                   method="GET">
                                                   @csrf
                                                   @method('PATCH')
                                                   <tr class="whitespace-nowrap">
                                                      <td class="px-6 py-4">
                                                         <div class="text-sm text-gray-900 text-center whitespace-normal">
                                                            <Strong><a
                                                                  href={{ route('projects.show', $project->id) }}>{{ $project->project_name }}</a></Strong>
                                                         </div>
                                                      </td>
                                                      <td class="px-0 py-0">
                                                         <div class="text-sm text-gray-900 text-left whitespace-normal ">
                                                            {{ $project->description }}
                                                         </div>
                                                      </td>
                                                      <td class="px-1 py-1">
                                                         <div class="text-sm text-gray-900 text-center">
                                                            {{ $project->requested_on }}
                                                         </div>
                                                      </td>
                                                      <td class="px-1 py-1">
                                                         <div class="text-sm text-gray-900 text-left">
                                                            {{ $project->requested_by }}
                                                         </div>
                                                      </td>
                                                      <td class="px-1 py-1">
                                                         <div class="text-sm text-gray-900 text-center">
                                                            @php
                                                               echo $project->deployed_on_staging == 1 ? "<div class='text-sm text-green-900 text-center  bg-green-300'> Yes</div>" : "<div class='text-sm text-red-900 text-center  bg-red-300'> No</div>";
                                                            @endphp
                                                         </div>
                                                      </td>
                                                      <td class="px-1 py-1">
                                                         <div class="text-sm text-gray-900 text-center">

                                                            @php
                                                               echo $project->deployed_on_production == 1 ? "<div class='text-sm text-green-900 text-center bg-green-300'> Yes</div>" : "<div class='text-sm text-gray-900 text-center bg-red-300'> No</div>";
                                                            @endphp
                                                         </div>
                                                      </td>
                                                      <td class="px-1 py-1">
                                                         <div class="text-sm text-gray-900 text-center">
                                                            {{ $project->delivered_on }}
                                                         </div>
                                                      </td>
                                                      <td class="px-1 py-1">
                                                         <div class="text-sm text-gray-900 text-center">
                                                            {{ $project->current_status }}
                                                         </div>
                                                      </td>



                                                      <td class="px-1 py-1">
                                                         <x-link-button color="black"
                                                            href="{{ route('projects.edit', $project->id) }}">
                                                            Edit
                                                         </x-link-button>
                                                      </td>

                                                </form>


                                                <td class="px-1 py-1">
                                                                <form
                                                                    action="{{ route('projects.destroy', $project->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <x-button color="red">Delete
                                                                    </x-button>
                                                                </form>
                                                            </td>
                                             @endforeach

                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           </span>
                        </div>














                        <div class="my-3">
                           {{ $projects->links() }}
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</x-app-layout>