<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser; // ← import this
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser // ← implement FilamentUser
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

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * This method determines whether a user can access Filament.
     *
     * Return `true` to allow all users,
     * or add your own logic to restrict certain users.
     */
    public function canAccessFilament(): bool
    {
        // For dev/testing: return true
        // return true;

        // For production, allow only specific users or roles:
        // e.g. if you have an `is_admin` column in `users` table:
        // return $this->is_admin === true;

        // Or check roles/permissions if using spatie/laravel-permission
        // return $this->hasRole('Admin');

        return true; // Temporarily open to all users
    }
}
