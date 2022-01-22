<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

	public function path()
	{
		# code...
		return route('courses.show', ['course' => $this->id]);
	}

	public function lessons()
	{
		# code...
		return $this->hasMany(Lesson::class);
	}
}
