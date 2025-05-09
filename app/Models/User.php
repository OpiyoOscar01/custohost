<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Custospark\Traits\Traits\HasAppRoles;
use Custospark\Traits\Models\Permission;
use Custospark\Traits\Models\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable,HasApiTokens,HasAppRoles;

    protected $connection = 'auth_db';


    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_image',
        'phone',
        'sex',
        'address'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'birthdate' => 'date',
        ];
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user')->withTimestamps();
    }
    public function permissions()
{
    return $this->belongsToMany(Permission::class, 'permission_user')->withTimestamps();
}

    public function hostels()
    {
        return $this->hasMany(Hostel::class, 'owner_id');
    }


    public function getOwnedHostels()
    {
        return $this->hostels()->get(); // Fetch all hostels owned by the user
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'student_id');
    }
    public function payments()
    {
        return $this->hasMany(Payment::class, 'student_id');
    }
    public function rooms()
    {
        return $this->hasMany(Room::class, 'owner_id');
    }
    public  function isHostelManager(): bool
    {
        return $this->hasRole('hostel_manager');
    }
    public function isStudent(): bool
    {
        return $this->hasRole('student');
    }
    public function isAdmin(): bool
    {
        return $this->hasRole('admin');
    }
    public function isSuperAdmin(): bool
    {
        return $this->hasRole('super_admin');
    }
    
    
}
