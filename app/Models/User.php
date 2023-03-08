<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\history;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $level = ['masyarakat', 'petugas', 'admin'];

    protected $fillable = [
        'name',
        'username',
        'password',
        'repassword',
        'level',
        'telepon',
        'alamat',
        'minat',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function history()
    {
        return $this->belongsTo(history::class);
    }

    public function lelang()
    {
        return $this->belongsTo(lelang::class);
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
