<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\barang;
use App\Models\lelang;
use App\Models\user;

class history extends Model
{
    use HasFactory;
    protected $table = 'history';
    protected $fillable =
    [
        'lelangs_id',
        'users_id',
        'nama_barang',
        'harga',
        'tanggal',
        'status'
    ];

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'users_id');
    }

    public function lelang()
    {
        return $this->hasOne('App\models\lelang', 'id', 'lelang_id');
    }
}
