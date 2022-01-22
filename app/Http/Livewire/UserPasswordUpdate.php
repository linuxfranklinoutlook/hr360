<?php

namespace App\Http\Livewire;

// use AWS\CRT\HTTP\Request;
use LivewireUI\Modal\ModalComponent; 
use App\Models\User;

use Livewire\Component;

class UserPasswordUpdate extends ModalComponent
{

	public function __construct(User $user)
	{
		# code...
		dd($user);
		$this->user = $user;
		
	}
    public function render()
    {
		dd($user); 
		// $user=User::find($user->id);

        return view('livewire.user-password-update',compact('user'));
    }
}
