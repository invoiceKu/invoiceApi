<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject; // Import JWTSubject

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    public $timestamp = true;

    protected $fillable = [
        'name',
        'email',
        'password',
        'no_hp',
        'alamat',
        'usia',
        'versi',
        'status_daftar',
        'foto_profil',
        'device_name',
        'os_version',
    ];

    protected $guarded = [];

    // Mengimplementasikan metode yang diwajibkan oleh JWTSubject
    public function getJWTIdentifier()
    {
        return $this->getKey(); // Mengembalikan ID registrasi sebagai identifier
    }

    public function getJWTCustomClaims()
    {
        return []; // Kamu bisa menambahkan klaim kustom jika diperlukan
    }

    // Fungsi untuk memastikan email disimpan dalam huruf kecil
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }
}
