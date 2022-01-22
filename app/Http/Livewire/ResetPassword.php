<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;  
use App\Models\User;
use Symfony\Component\HttpFoundation\Request;

class ResetPassword extends ModalComponent
{
    public function render( $user)
    {
		// dd($user);
		$user=User::find($user);
        return view('livewire.reset-password', compact('user'));
    }
}
