<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Kolom yang boleh diisi secara mass assignment
    protected $fillable = [
        'name',         // Nama lengkap user
        'username',     // Username unik untuk login
        'email',        // Email unik untuk login
        'password',     // Password yang akan di-hash otomatis
    ];

    // Kolom yang disembunyikan saat serialisasi (response JSON/Array)
    protected $hidden = [
        'password',        // Jangan tampilkan password di response
        'remember_token', // Jangan tampilkan token di response
    ];

    // Tipe data casting untuk kolom tertentu
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime', // Cast ke object DateTime
            'password' => 'hashed',            // Otomatis hash password saat insert/update
        ];
    }

    // // Relasi: Satu user memiliki banyak posts (One-to-Many)
    // public function post(): HasMany
    // {
    //     return $this->hasMany(Post::class, 'user_id');
    //     // 'user_id' adalah foreign key di tabel posts yang menunjuk ke users.id
    // }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}