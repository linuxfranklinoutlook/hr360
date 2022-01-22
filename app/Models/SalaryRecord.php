<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalaryRecord extends Model
{
    use HasFactory;
	use SoftDeletes;

	public $guarded = ['id'];

	public function employee()
	{
		# code...
		return $this->belongsTo(Employee::class);
	}

	public function salarystructure()
	{
		return $this->belongsTo(SalaryStructure::class);
	}

	public function deductions()
	{
		# code...
		return $this->hasMany(SalaryDeduction::class);
	}
}
