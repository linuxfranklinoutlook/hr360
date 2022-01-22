<?php

namespace App\Models;

use App\Traits\Likable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
	use Likable;

	public function customField($customField = null)
	{
		# code...
		return $this->customFields()->attach($customField);
	}

	public function customFields()
	{
		# code...
		return $this->morphToMany(CustomField::class, "customable")->withTimestamps()->withPivot('field_value');
	}
}
