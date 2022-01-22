<x-app-layout>

   <x-slot name="breadcrumbs">
      {{ Breadcrumbs::render('clients') }}
   </x-slot>

   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         {{ __('Clients') }}
      </h2>
   </x-slot>

   <div class="py-6 relative">
      <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
         <div class="overflow-hidden shadow-xs sm:rounded-lg">
            <div class="p-6 card">
               <h3 class="text-4xl">List of Clients</h3>
               <div class="my-4">
                  <x-link-button color="blue" onClick="Livewire.emit('openModal', 'create-client')">Create New
                  </x-link-button>
               </div>
               <form action="" method="GET">
                  <div class="flex items-center space-x-3 flex-wrap gap-2">
                     <span class="flex-1">
                        <x-input type="text" name="query"
                           placeholder="Search Clients via  Client name, Owner name,  Contact person, Email, Contact number"
                           label="Search For Tasks" />

                        <x-button>Filter</x-button>
                        <x-link-button color="red" href="{{ route('clients.index') }}">Clear Filters
                        </x-link-button>
                     </span>
                  </div>
               </form>
               <div class="flex flex-col my-8">
                  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                     <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                           <div class="p-2 bg-glass backdrop-filter backdrop-blur-xl  sm:rounded-lg">
                              <h1>List of clients </h1>
                           </div>

                           <div class="container flex justify-center mx-auto p-6  sm:rounded-lg">
                              <div class="flex flex-col">
                                 <div class="w-full">
                                    <div class="border-b border-gray-200 shadow  sm:rounded-lg">
                                       <table class="divide-y divide-gray-300 ">
                                          <thead class="bg-gray-700 ">
                                             <tr>
                                                <th class="px-6 py-2 text-xm text-white">
                                                   Client Name
                                                </th>
                                                <th class="px-6 py-2 text-xm text-white">
                                                   Client ID
                                                </th>
                                                <th class="px-6 py-2 text-xm text-white">
                                                   Contact Person
                                                </th>
                                                <th class="px-6 py-2 text-xm text-white">
                                                   Email Id
                                                </th>
                                                <th class="px-6 py-2 text-xm text-white">
                                                   Contact Number
                                                </th>

                                                <th class="px-6 py-2 text-xs text-gray-500">
                                                </th>
                                                <th class="px-6 py-2 text-xs text-gray-500">
                                                </th>

                                             </tr>
                                          </thead>

                                          <tbody class="bg-white divide-y divide-gray-300">
                                             @foreach ($clients as $client)
                                                <form action="{{ route('clients.edit', $client->id) }}" method="GET">
                                                   @csrf
                                                   @method('PATCH')
                                                   <tr class="whitespace-nowrap">
                                                      <td class="px-6 py-4 text-sm text-gray-900">
                                                         <Strong><a
                                                               href={{ route('clients.show', $client->id) }}>{{ $client->client_name }}
                                                            </a></Strong>
                                                      </td>
                                                      <td class="px-6 py-4">
                                                         <div class="text-sm text-gray-900">
                                                            {{ $client->client_id }}
                                                         </div>
                                                      </td>

                                                      @php
                                                         $contact_persons = json_decode($client->client_contact_person);
                                                         if ($contact_persons) {
                                                             echo "<td class='px-6 py-4'>";
                                                             echo "<div class='text-sm text-gray-500'>";
                                                             $contact_persons = json_decode($client->client_contact_person);
                                                             $i = count($contact_persons);
                                                             for ($n = 0; $n < $i; $n++) {
                                                                 echo $contact_persons[$n] . '<br>';
                                                             }
                                                             echo "</div> 
                                                                                                                                         </td>";
                                                         
                                                             echo "<td class='px-6 py-4'>";
                                                             echo "<div class='text-sm text-gray-500'>";
                                                             $contact_email = json_decode($client->client_contact_email);
                                                             $i = count($contact_email);
                                                             for ($n = 0; $n < $i; $n++) {
                                                                 echo $contact_email[$n] . '<br>';
                                                             }
                                                             echo "</div> 
                                                                                                                                         </td>";
                                                         
                                                             echo "<td class='px-6 py-4'>";
                                                             echo "<div class='text-sm text-gray-500'>";
                                                             $contact_number = json_decode($client->client_contact_number);
                                                             $i = count($contact_number);
                                                             for ($n = 0; $n < $i; $n++) {
                                                                 echo $contact_number[$n] . '<br>';
                                                             }
                                                             echo "</div> 
                                                                                                                                         </td>";
                                                         } else {
                                                             echo "<td class='px-6 py-4'>";
                                                             echo "<div class='text-sm text-gray-500'>";
                                                             echo ' No Contact person </div></td>';
                                                             echo "<td class='px-6 py-4'>";
                                                             echo "<div class='text-sm text-gray-500'>";
                                                             echo 'No email id</div></td>';
                                                             echo "<td class='px-6 py-4'>";
                                                             echo "<div class='text-sm text-gray-500'>";
                                                             echo ' No Contact number </div></td>';
                                                         }
                                                      @endphp

                                                      {{-- @if ($i > 0) --}}


                                                      </td>

                                                      {{-- @else --}}


                                                      {{-- @endif --}}



                                                      <td class="px-6 py-4">
                                                         <x-link-button color="black"
                                                            href="{{ route('clients.edit', ['client' => $client->id]) }}">
                                                            Edit
                                                         </x-link-button>
                                                      </td>

                                                </form>


                                                <td class="px-6 py-4">
                                                   <form action="{{ route('clients.destroy', $client->id) }}"
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
                           {{ $clients->links() }}
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</x-app-layout>
