<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;
use App\Models\Role;

class CreateNewUser extends ModalComponent
{
    public function render()
    {
		$roles=Role::get();
        return view('livewire.create-new-user', compact('roles'));
    }
}
