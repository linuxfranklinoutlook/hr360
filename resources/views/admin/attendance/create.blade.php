<x-app-layout>

   <x-slot name="breadcrumbs">
      {{ Breadcrumbs::render('attendance.create') }}
   </x-slot>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         {{ __('Mark Attendance') }}
      </h2>
   </x-slot>
   <div class="py-6 relative">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
         <div class="overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-glass backdrop-filter backdrop-blur-xl">
               <h3 class="text-xl">Mark Attendance {{ now() }}</h3>


               <div class="my-6">
                  <table class="table-fixed bg-gray-600">
                     <thead>
                        <tr>
                           <th class="w-1/2 ... text-center">Name</th>
                           <th class="w-1/4 ...">Employee ID</th>

                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($employees as $employee)
                           <form action="{{ route('attendance.store') }}" method="POST"
                              enctype="multipart/form-data">
                              @csrf
                              <tr class="bg-blue-200 text-center">
                                 <td> {{ $employee->employees->getFullName() }} </td>
                                 <td>{{ $employee->emp_id }}</td>
                                 {{-- <input type="hidden" name="employee_id" value="{{ $employee->id }}"/> --}}

                                 


                                 <td>
                                    <x-button value='Present' name="status" color="green">Present</x-button>
                                 </td>
                                 <td>
                                    <x-button value='Absent' name="status" color="red">Absent</x-button>
                                 </td>
                                 <td><input type="hidden" name="employee_id" id="employee_id"
                                       value="{{ $employee->id }}"></td>
                              </tr>
                           </form>

                        @endforeach

                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
   
   




</x-app-layout>
