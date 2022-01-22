<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class CreateDestination extends ModalComponent
{
    public function render()
    {
        return view('livewire.create-destination');
    }
}
