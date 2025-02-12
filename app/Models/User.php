<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser
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

    // Filament v3 requires this method:
    public function canAccessPanel(Panel $panel): bool
    {
        // For dev/testing, allow all users:
        return true;

        // Or restrict to certain users only, e.g.:
        // return $this->is_admin === true;
    }
}
