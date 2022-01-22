<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
// use App\Models\Role;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
		'role_id',
		'verification_code',
		'is_verified'

    ];

	public function scopeFilter($query, array $filters)
	{


		$query->when($filters['query'] ?? false, fn($query, $search) => 
			$query->where('name', 'like', '%' . $search . '%')
				->orWhere('email', 'like','%' . $search . '%')
			);

		
	}

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

	// public function getIsAdminAttribute()
    // {
	// 	// dd($this->roles()->where('role_id', 1));
    //     return $this->roles()->where('id', 1)->exists();
    // }

	public function path()
	{
		# code...
		return route('admin.users.show', ['user' => $this->id]);
	}
	public function role()
	{
		return $this->belongsTo(Role::class,'role_id','id');
	}

	public function hasPermission($name)
	{
		return $this->role->permissions()->where('name',$name)->exists();
	}
	public function likedPosts()
	{
		# code...
		return $this->morphedByMany(Post::class, "likable");
	}
}
