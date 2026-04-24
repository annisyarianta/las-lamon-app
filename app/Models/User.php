<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone',
    ];

    public function isAdopter()
    {
        return $this->role === 'adopter';
    }

    public function isSuperAdmin()
    {
        return $this->role === 'superadmin';
    }

    public function isLsm()
    {
        return $this->role === 'lsm';
    }

    public function getRoleBadgeAttribute()
    {
        return match ($this->role) {
            'superadmin' => 'bg-light text-danger border border-danger',
            'lsm' => 'bg-light text-warning border border-warning',
            'adopter' => 'bg-light text-primary border border-primary',
            default => 'bg-secondary text-white',
        };
    }

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
        ];
    }

    public function cart()
    {
        return $this->hasOne(Cart::class, 'id_user', 'id');
    }
}
