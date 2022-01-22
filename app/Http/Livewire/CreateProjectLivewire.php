<?php

namespace App\Http\Livewire;

// use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use App\Models\Client;
use App\Models\Employee;

class CreateProjectLivewire extends ModalComponent
{
    public function render()
    {

        $clients = Client::all();
        $employees=Employee::all();
        return view('livewire.create-project-livewire',['clients' => $clients,'employees'=>$employees] );
    }
}
