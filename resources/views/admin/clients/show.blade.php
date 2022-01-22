<x-app-layout>
   <x-slot name="breadcrumbs">
      {{ Breadcrumbs::render('clients.show') }}
   </x-slot>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         {{ __('Client View : ' . $client->client_name) }}
      </h2>
   </x-slot>
   <div class="py-6 relative">
      <div class="py-6 relative max-w-6xl mx-auto sm:px-9 lg:px-8  bg-gray-10 sm:rounded-lg">

         <div class="backdrop-filter backdrop-blur-lg px-3 py-3 rounded-md shadow my-3  bg-gray-900 text-justify ">
            <span class="flex items-center justify-between py-3  ">
               <h3 class="text-2xl text-white">{{ $client->client_name }} ({{ $client->client_owner_name }})
               </h3>
               <x-badge color="green">GST 458787</x-badge>
         </div>

         <div class="backdrop-filter backdrop-blur-lg px-3 py-3 rounded-md shadow my-3  bg-white text-justify">
            <div class="grid grid-cols-2 gap-1 ">
               <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                  <dt class="text-sm font-medium text-gray-900">
                     <strong>Client Name </strong>
                  </dt>
                  <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                     {{ $client->client_name }}
                  </dd>
                  <dt class="text-sm font-medium text-gray-900">
                     <strong>Client id </strong>
                  </dt>
                  <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                     {{ $client->client_id }}
                  </dd>
                  <dt class="text-sm font-medium text-gray-900">
                     <strong> Owner </strong>
                  </dt>
                  <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                     {{ $client->client_owner_name }}
                  </dd>
                  <dt class="text-sm font-medium text-gray-900">
                     <strong> Owner email</strong>
                  </dt>
                  <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                     {{ $client->client_owner_email }}
                  </dd>
                  <dt class="text-sm font-medium text-gray-900">
                     <strong> Contact number </strong>
                  </dt>
                  <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                     {{ $client->client_owner_number }}
                  </dd>
                  <dt class="text-sm font-medium text-gray-900">
                     <strong>Address</strong>
                  </dt>
                  <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                     {{ $client->address }}
                  </dd>
               </div>


               <div class="py-4 sm:py-5 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-6">
                  @if ($client->client_contact_person)


                     <dd class="text-sm font-medium text-gray-900">
                        <h2>Contacts</h2>

                        @php
                           $contact_persons = json_decode($client->client_contact_person);
                           $client_contact_number = json_decode($client->client_contact_number);
                           $client_contact_email = json_decode($client->client_contact_email);
                           $i = count($contact_persons);
                           for ($n = 0; $n < $i; $n++) {
                               echo '<pre>' . '<br><br>' . 'Name     :' . $contact_persons[$n] . '<br>' . 'Number   :' . $client_contact_number[$n] . '<br>' . 'Email    :' . $client_contact_email[$n] . '</pre>';
                           }
                        @endphp
                     </dd>
                  @endif
               </div>
            </div>
         </div>
         <div class="backdrop-filter backdrop-blur-lg px-3 py-3 rounded-md shadow my-3  bg-gray-900 text-justify ">
            <div class="grid grid-cols-2 gap-3 ">
               <span class="flex justify-end my-2 space-x-1 px-1 bg-auto">
                  <x-link-button color="red" href="{{ route('clients.edit', ['client' => $client->id]) }}">Edit
                  </x-link-button>
                  <x-link-button color="green" href=" {{ route('clients.index') }}">Back
                  </x-link-button>
               </span>
            </div>
         </div>
      </div>
   </div>
</x-app-layout>
