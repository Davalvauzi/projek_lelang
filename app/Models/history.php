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
    protected $table = 'histories';
    protected $fillable =
    [
        'lelangs_id',
        'users_id',
        'barangs_id',
        'harga_penawaran',
        'status'
    ];

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'users_id');
    }

    public function lelang()
    {
        return $this->hasOne('App\models\lelang', 'id', 'lelangs_id', 'status');
    }

    public function barang()
    {
        return $this->hasOne('App\models\barang', 'id', 'barangs_id', 'status');
        // return $this->belongsTo(Barang::class);
    }
}
