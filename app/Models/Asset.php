<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Asset extends Model
{
    use HasFactory;
	use InteractsWithMedia;
	protected $guarded=['id'];

	protected $dates=['due_date','issued_date', 'purchase_date'];

	public function setDue_DateAttributes($value)
	{
		return $this->attributes['due_date']=Carbon::parse($value);
	}

	public function setIssued_DateAttributes($value)
	{
		return $this->attributes['issued_date']=Carbon::parse($value);
	}
	public function setPurchase_DateAttributes($value)
	{
		return $this->attributes['purchase_date']=Carbon::parse($value);
	}


	public function scopeFilter($query, array $filters)
	{
		$query->when($filters['query'] ?? false,
			fn($query, $search) =>
			$query->where('model', 'like', '%' . $search . '%')
			->orWhere('host_name', 'like', '%' . $search . '%' )
			->orWhere('asset_type', 'like', '%' . $search . '%')
			->orWhere('os_name', 'like', '%' . $search . '%')
			->orWhere('asset_tag', 'like', '%' .$search . '%')
			->orWhere('serial_number', 'like' ,'%' . $search . '%')
		);
	}

	public function path()
	{
		return route('admin.assets.show',['asset'=>$this->id]);
	}

}
