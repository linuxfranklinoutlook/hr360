<x-app-layout>
   <x-slot name="breadcrumbs">
      {{ Breadcrumbs::render('tasks.show') }}
   </x-slot>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         {{ __('Task View : ' . 'Task View') }}
      </h2>
   </x-slot>
   <div class="py-6 relative">
      <div class="py-6 relative max-w-8xl mx-auto sm:px-9 lg:px-8  bg-gray-10 sm:rounded-lg">

         <div class="backdrop-filter backdrop-blur-lg px-3 py-3 rounded-md shadow my-3  bg-gray-900 text-center ">
            <span class="flex items-center justify-center py-3  ">
               <h3 class="text-2xl text-white text-center"><strong> Project Name :</strong> 
                 {{ $task->projects->project_name }}<strong> Assigned To :</strong> {{ $task->employees->getFullName() }}
               </h3>
               
         </div>

         <div class="backdrop-filter backdrop-blur-lg px-3 py-3 rounded-md shadow my-3  bg-white text-justify">
            <div class="grid grid-cols-2 gap-1 ">
               <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                  <dt class="text-sm font-medium text-gray-900">
                     <strong>Client Name </strong>
                  </dt>
                  <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                     {{ $task->clients }}
                  </dd>
                  <dt class="text-sm font-medium text-gray-900">
                     <strong>Project Name </strong>
                  </dt>
                  <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    {{ $task->projects->project_name }}
                  </dd>
                  <dt class="text-sm font-medium text-gray-900">
                     <strong> Developers/Designers </strong>
                  </dt>
                  <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                     {{ $task->employees->getFullName() }}
                  </dd>
                  <dt class="text-sm font-medium text-gray-900">
                     <strong> Task Type</strong>
                  </dt>
                  <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                     {{ $task->projects->task_type }}
                  </dd>
                  <dt class="text-sm font-medium text-gray-900">
                     <strong> Description </strong>
                  </dt>
                  <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                     {{ $task->projects->description }}
                  </dd>
                  <dt class="text-sm font-medium text-gray-900">
                     <strong>Requested By</strong>
                  </dt>
                  <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                     {{ $task->projects->requested_by  }}
                  </dd>

                  <dt class="text-sm font-medium text-gray-900">
                     <strong>Requested on</strong>
                  </dt>
                  <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                     {{ $task->projects->requested_on  }}
                  </dd>
               </div>
               <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                  <dt class="text-sm font-medium text-gray-900">
                     <strong>Effort Estimated by</strong>
                  </dt>
                  <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                     {{ $task->projects->effort_estimation_by   }}
                  </dd>
                  <dt class="text-sm font-medium text-gray-900">
                     <strong>Estimated Hours</strong>
                  </dt>
                  <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                     {{ $task->projects->estimated_hours  }} 
                  </dd>
                  <dt class="text-sm font-medium text-gray-900">
                     <strong>Deployed on Staging</strong>
                  </dt>
                  <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                     @php
                        echo $task->projects->deployed_on_staging == 1 ? "<div class='text-sm text-green-900 text-left  '> Yes</div>" : "<div class='text-sm text-red-900 text-left  '> No</div>";
                     @endphp

                  </dd>
                  <dt class="text-sm font-medium text-gray-900">
                     <strong>Deployed on Production</strong>
                  </dt>
                  <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 ">
                     @php
                        echo $task->projects->deployed_on_production == 1 ? "<div class='text-sm text-green-900 text-left '> Yes</div>" : "<div class='text-sm text-gray-900 text-left '> No</div>";
                     @endphp
                  </dd>
                  <dt class="text-sm font-medium text-gray-900">
                     <strong>Delivered On</strong>
                  </dt>
                  <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                     {{ $task->projects->delivered_on  }} 
                  </dd>
                  <dt class="text-sm font-medium text-gray-900">
                     <strong>Current Status</strong>
                  </dt>
                  <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                     {{ $task->projects->current_status }}
                  </dd>
                  <dt class="text-sm font-medium text-gray-900">
                     <strong>Estimated Hours</strong>
                  </dt>
                  <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                     {{ $task->projects->estimated_hours}} 
                  </dd>
                  <dt class="text-sm font-medium text-gray-900">
                     <strong>Notes</strong>
                  </dt>
                  <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                     {{ $task->projects->notes }}
                  </dd>
               </div>
            </div>
         </div>
         <div class="backdrop-filter backdrop-blur-lg px-3 py-3 rounded-md shadow my-3  bg-gray-900 text-justify ">
            <div class="grid grid-cols-2 gap-3 ">
               <span class="flex justify-end my-2 space-x-1 px-1 bg-auto">
                  <x-link-button color="red" href="{{ route('tasks.edit', ['task' => $task->id]) }}">
                     Edit
                  </x-link-button>
                  <x-link-button color="green" href=" {{ route('tasks.index') }}">Back
                  </x-link-button>
               </span>
            </div>
         </div>
      </div>
   </div>
</x-app-layout>