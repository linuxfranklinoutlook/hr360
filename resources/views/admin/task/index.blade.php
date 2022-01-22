<x-app-layout>
   <x-slot name="breadcrumbs">
      {{ Breadcrumbs::render('tasks') }}
   </x-slot>

   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         {{ __('Tasks') }}
      </h2>
   </x-slot>

   <div class="py-6 relative">
      <div class="max-w-8xl mx-auto sm:px-4 lg:px-4 sm:rounded-lg">
         <div class="overflow-hidden shadow-xs sm:rounded-lg">
            <div class="p-4 card">
               <h3 class="text-4xl">List of Tasks</h3>
               <div class="my-4">
                  <x-link-button color="blue" onClick="Livewire.emit('openModal', 'create-task')">
                     Create New
                  </x-link-button>
                  {{-- <x-link-button color="blue" href="{{ route('tasks.create') }}">Create New </x-link-button> --}}
               </div>
               <form action="" method="GET">
                  <div class="flex items-center space-x-3 flex-wrap gap-2">
                     <span class="flex-1">
                        <x-input type="text" name="query"
                           placeholder="Search Tasks via Task Name, Task type, requested by" label="Search For Tasks" />
                        <x-button>Filter</x-button>
                        <x-link-button color="red" href="{{ route('tasks.index') }}">Clear Filters
                        </x-link-button>
                     </span>
                  </div>
               </form>


               <div class="flex flex-col my-6 sm:rounded-lg">
                  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 sm:rounded-lg">
                     <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8 sm:rounded-lg">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                           <div class="p-2 bg-glass backdrop-filter backdrop-blur-xl  sm:rounded-lg text-center">
                              <h1 text-center>Listing all Tasks </h1>
                           </div>

                           <div class="container flex justify-center mx-auto p-6  sm:rounded-lg">
                              <div class="flex flex-col">
                                 <div class="w-full">
                                    <div class="border-b border-gray-200 shadow  sm:rounded-lg">
                                       <table class="divide-y divide-gray-300 ">
                                          <thead class="bg-gray-700 ">
                                             <tr>
                                                

                                                <th class="px-6 py-2 text-xm text-white">
                                                   Project Name
                                                </th>
                                                <th class="px-6 py-2 text-xm text-white">
                                                   Desigination
                                                </th>
                                                <th class="px-6 py-2 text-xm text-white">
                                                   Assigned to Employee
                                                </th>


                                                
                                                <th class="px-6 py-2 text-xm text-white">
                                                   Starting date
                                                </th>
                                                <th class="px-6 py-2 text-xm text-white">
                                                   Ending Date
                                                </th>
                                                <th class="px-6 py-2 text-xm text-white">
                                                   Status
                                                </th>
                                                <th class="px-6 py-2 text-xm text-white">
                                                   Notes
                                                </th>
                                                <th class="px-6 py-2 text-xm text-white">

                                                </th>
                                                <th class="px-6 py-2 text-xm text-white">

                                                </th>



                                             </tr>
                                          </thead>

                                          <tbody class="bg-white divide-y divide-gray-300">
                                             @foreach ($tasks as $task)
                                                {{-- @foreach ($task->projects as $project) --}}
                                                <form action="{{ route('tasks.edit', $task->id) }}" method="GET">
                                                   @csrf
                                                   @method('PATCH')
                                                   @if ($task->projects->current_status=='Completed')
                                                       
                                                   
                                                   <tr class="whitespace-wrap">
                                                      
                                                      <td class="px-6 py-4">
                                                         <div class="text-sm text-gray-900 text-center">
                                                            <Strong>



                                                               <a href={{ route('tasks.show', $task->id) }}>{{ $task->projects->project_name }}</a>

                                                            </Strong>

                                                         </div>
                                                      </td>

                                                      <td class="px-6 py-4">
                                                         <div class="text-sm text-gray-900 text-center">
                                                            {{ $task->employees->desigination }}
                                                         </div>
                                                      </td>

                                                      <td class="px-6 py-4">
                                                         <div class="text-sm text-gray-900 text-center">
                                                            {{ $task->employees->getFullName() }}
                                                         </div>
                                                      </td>






                                                      <td class="px-6 py-4">
                                                         <div class="text-sm text-gray-900 text-center">
                                                            {{ $task->projects->requested_on }}
                                                         </div>
                                                      </td>
                                                      <td class="px-10 py-10">
                                                         <div class="text-sm text-gray-900 text-center">
                                                            {{ $task->projects->delivered_on  }}
                                                         </div>
                                                      </td>
                                                      <td class="px-10 py-10">
                                                         <div class="text-sm text-gray-900 text-center">

                                                            {{ $task->projects->current_status }}
                                                         </div>
                                                      </td>
                                                      <td class="px-6 py-4">
                                                         <div class="text-sm text-gray-900 text-center">
                                                            Notes
                                                         </div>
                                                      </td>
                                                    
                                                      <td class="px-6 py-4">
                                                         <x-link-button color="black"
                                                            href="{{ route('tasks.edit', $task->id) }}">
                                                            Edit
                                                         </x-link-button>
                                                      </td>

                                                </form>


                                                <td class="px-6 py-4">
                                                   <form action="{{ route('tasks.destroy', $task->id) }}"
                                                      method="POST">
                                                      @csrf
                                                      @method('DELETE')
                                                      <x-button color="red">Delete
                                                      </x-button>
                                                   </form>
                                                </td>
                                           
                                             {{-- @endforeach --}}
                                             


                                             @else 
                                             
                                                       
                                                   
                                                   <tr class="whitespace-wrap">
                                                      
                                                      <td class="px-6 py-4">
                                                         <div class="text-sm text-gray-900 text-center">
                                                            <Strong>



                                                               <a href={{ route('tasks.show', $task->id) }}>{{ $task->projects->project_name }}</a>

                                                            </Strong>

                                                         </div>
                                                      </td>

                                                      <td class="px-6 py-4">
                                                         <div class="text-sm text-gray-900 text-center">
                                                            {{ $task->employees->desigination }}
                                                         </div>
                                                      </td>

                                                      <td class="px-6 py-4">
                                                         <div class="text-sm text-gray-900 text-center">
                                                            {{ $task->employees->getFullName() }}
                                                         </div>
                                                      </td>






                                                      <td class="px-6 py-4">
                                                         <div class="text-sm text-gray-900 text-center">
                                                            {{ $task->projects->requested_on }}
                                                         </div>
                                                      </td>
                                                      <td class="px-10 py-10">
                                                         <div class="text-sm text-gray-900 text-center">
                                                            {{ $task->projects->delivered_on  }}
                                                         </div>
                                                      </td>
                                                      <td class="px-10 py-10">
                                                         <div class="text-sm text-gray-900 text-center">

                                                            {{ $task->projects->current_status }}
                                                         </div>
                                                      </td>
                                                      <td class="px-6 py-4">
                                                         <div class="text-sm text-gray-900 text-center">
                                                            Notes
                                                         </div>
                                                      </td>
                                                    
                                                      <td class="px-6 py-4">
                                                         <x-link-button color="black"
                                                            href="{{ route('tasks.edit', $task->id) }}">
                                                            Edit
                                                         </x-link-button>
                                                      </td>

                                                </form>


                                                <td class="px-6 py-4">
                                                   <form action="{{ route('tasks.destroy', $task->id) }}"
                                                      method="POST">
                                                      @csrf
                                                      @method('DELETE')
                                                      <x-button color="red">Delete
                                                      </x-button>
                                                   </form>
                                                </td>
                                           
                                             {{-- @endforeach --}}
                                             @endif
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
                           {{ $tasks->links() }}
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</x-app-layout>