<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    // Kolom yang boleh diisi
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    // Kolom yang disembunyikan
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Casting otomatis
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relasi: user punya banyak report
    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}
