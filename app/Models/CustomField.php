<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomField extends Model
{
    use HasFactory;

	public function data()
	{
		# code...
		return $this->hasMany(CustomField::class);
	}
}
