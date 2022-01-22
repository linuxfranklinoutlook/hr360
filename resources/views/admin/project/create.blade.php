<x-app-layout>
   <x-slot name="breadcrumbs">
      {{ Breadcrumbs::render('projects.create') }}
   </x-slot>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         {{ __('Add new Project ') }}
      </h2>
   </x-slot>



   <!DOCTYPE html>
   <html>

   <head>
      <title>Create Project </title>
      <link rel="stylesheet"
         href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" />
      <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css"
         rel="stylesheet">
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
      @livewireStyles()
   </head>

   <body>

      <div class="py-3 relative">
         <div
            class="max-w-5xl mx-auto backdrop-filter  backdrop-blur-xl px-3 py-3 rounded-md shadow my-7 bg-gray-200 p-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg p-6">

               <div class="p-1 bg-white rounded-md px-15 py-15">
                  <h3 class="text-xl">Create New Project</h3>
               </div>

            </div>



            @if ($errors->any())
               <div class="alert alert-danger">
                  <ul>
                     @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                     @endforeach
                  </ul>
               </div>
            @endif

            <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <div class="my-6  p-5 ">
                  <x-select type="text" label="Client Name" name="client_id" id="client_id"
                     value="{{ old('clinet_name') }}">
                     @foreach ($clients as $client)
                        <option value="{{ $client->id }}">
                           {{ $client->client_name }}</option>
                     @endforeach
                  </x-select>
                  {{-- <td><input type="text" name="client_id" id="client_id"
                                value="{{ $client->id }}"></td> --}}
               </div>
               <div class="my-1 p-5 ">
                  <x-input type="text" label="Project Name" name="project_name" id="project_name"
                     value="{{ old('project_name') }}" />
               </div>
               <div class="my-6 p-5">
                  <x-input type="text" label="Project Manager" name="project_manager" id="project_manager"
                     value="{{ old('project_manager') }}" />
               </div>
               <div class="my-6 p-5">
                  {{-- <x-input type="text" label="Task Type" name="task_type"
                                                        id="task_type" value="{{ old('task_type') }}" /> --}}
                  <x-select name="task_type" id="task_type" label="Task Type">
                     <option value="Enhancement">Enhancement</option>
                     <option value="Change Request">Change Request</option>
                     <option value="Bug">Bug</option>
                     <option value="User Interface">User Interface</option>
                     <option value="Training">Training</option>
                     <option value="Support">Support</option>
                  </x-select>
               </div>
               <div class="my-6 p-5">
                  <x-textarea type="text" label="Description" name="description" id="description"
                     value="{{ old('description') }}" />
               </div>
               <div class="my-6 p-5">
                  <x-input type="text" label="Requested By" name="requested_by" id="requested_by"
                     value="{{ old('requested_by') }}" />
               </div>
               <div class="my-6 p-5">
                  <x-input type="text" class="date" label="Requested On" name="requested_on" id="requested_on"
                     value="{{ old('requested_by') }}" />
               </div>
               <div class="my-6 p-5">
                  <x-input type="text" label="Effort Estimation by" name="effort_estimation_by"
                     id="effort_estimation_by" value="{{ old('effort_estimation_by') }}" />
               </div>
               <div class="my-6 p-5">
                  <x-input type="text" label="Estimated Hours" name="estimated_hours" id="hours"
                     value="{{ old('estimated_hours') }}" />
               </div>
               <div class="my-6 p-5">

                  <x-select name="deployed_on_staging" id="deployed_on_staging" label="Deployed On Staging">
                     <option value="{{ old('deployed_on_staging') }}">
                        {{ old('deployed_on_staging') }}</option>
                     <option value="0">No</option>
                     <option value="1">Yes</option>
                  </x-select>
               </div>
               <div class="my-6 p-5">


                  <x-select name="deployed_on_production" id="deployed_on_production" label="Deployed On Production">
                     <option value="{{ old('deployed_on_production') }}">
                        {{ old('deployed_on_production') }}</option>
                     <option value="0">No</option>
                     <option value="1">Yes</option>
                  </x-select>
               </div>
               <div class="my-6 p-5">
                  <x-input type="text" class="date" label="Delivered On" name="deliverd_on" id="delivered_on"
                     value="{{ old('delivered_on') }}" />
               </div>
               <div class="my-6 p-5">
                  <x-select name="current_status" id="current_status" label="Current Status">
                     <option value="In Progress">In Progress</option>
                     <option value="Completed">Completed</option>
                     <option value="Limbo">Limbo</option>
                  </x-select>
               </div>
               {{-- <div class="my-6">
                            <x-input type="text" label="Developers" name="developers"
                                value="{{ old('developers') }}" />
                        </div>
                        <div class="my-6">
                            <x-input type="text" label="Designer" name="designers" value="{{ old('designers') }}" />
                        </div> --}}

               <div class="my-6 p-5">
                  <x-textarea type="text" label="Notes" name="notes">
                     {{ old('notes') }}</x-textarea>
               </div>
               <span class="flex items-right justify-center my-3 space-x-3 px-4">
                  <x-button>Submit</x-button>
               </span>
            </form>
         </div>
      </div>
   </body>
   <script type="text/javascript">
      $('.date').datepicker({
         format: 'yyyy-mm-dd'
      });
   </script>

   </html>
   @livewireScripts()
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
   </script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
   </script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
   </script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"
      integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ=="
      crossorigin="anonymous"></script>
</x-app-layout>
