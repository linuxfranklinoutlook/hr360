<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'project_name',
        'project_manager',
        'task_type',
        'description',
        'requested_by',
        'requested_on',
        'effort_estimation_by',
        'estimated_hours',
        'deployed_on_staging',
        'deployed_on_production',
        'deliverd_on',
        'current_status',
        'developers',
        'designers',
        'notes',
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when(
            $filters['query'] ?? false,
            fn ($query, $search) =>
            $query->where('project_name', 'like', '%' . $search . '%')
                ->orWhere('project_manager', 'like', '%' . $search . '%')
               
        );
    }

   public function client()
   {
       return $this->belongsTo(Client::class)->withDefault();
   }
}
