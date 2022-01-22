<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class CreateRoles extends ModalComponent
{
    public function render()
    {
        return view('livewire.create-roles');
    }
}
