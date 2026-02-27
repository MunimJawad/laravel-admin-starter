<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Many-to-Many Relationship with roles
    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    // Check if user has a specific role
    public function hasRole($role){
        return $this->roles()->where('name', $role)->exists();
    }

    // Optional: Check multiple roles
    public function hasAnyRole(array $roles){
        return $this->roles()->whereIn('name', $roles)->exists();
    }

    // Check permission through roles
    public function hasPermission($permission){
        return $this->roles()
            ->whereHas('permissions', function($q) use($permission){
                $q->where('name', $permission);
            })->exists();
    }
}