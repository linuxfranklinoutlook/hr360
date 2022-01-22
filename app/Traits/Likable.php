<?php

namespace App\Traits;
use App\Models\User;
/**
 * Likable Trait
 */
trait Likable
{
	public function like($user = null)
	{
		# code...
		$user = $user ?: auth()->user();

		return $this->likes()->attach($user);
	}

	public function likes()
	{
		# code...
		return $this->morphToMany(User::class, "likable")->withTimestamps();
	}
}
