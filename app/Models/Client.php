<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use function JmesPath\search;

class Client extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded=['id'];
    protected $fillable = [
        'client_name',
        'client_id',
        'client_owner_name',
        'client_owner_email',
        'client_owner_number',
        'address',
        'client_contact_person[]',
        'client_contact_number[]',
        'client_contact_email[]',


    ]; 
    public function scopeFilter($query, array $filters)
	{
		$query->when($filters['query'] ?? false, fn($query, $search)=>
            $query->where('client_name', 'like', '%' . $search . '%')
                    ->orWhere('client_owner_name', 'like', '%' . $search . '%')
                    ->orWhere('client_contact_person', 'like', '%' . $search . '%')
                    ->orWhere('client_contact_number', 'like', '%' . $search . '%')
    );

		
		
		
    }
    public function projects()
	{
		return $this->hasMany(Project::class, 'id', 'projects.id');
	}

    public function path()
	{
		return route('clients.show',['client'=>$this->id]);
	}
}
