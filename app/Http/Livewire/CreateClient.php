<?php

namespace App\Http\Livewire;

// use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class CreateClient extends ModalComponent 
{
    public function addContacts() {
        dd('test');
    }
    public function render()
    {
        return view('livewire.create-client');
    }
}
