<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\barang;
use App\Models\history;

class lelang extends Model
{
    use HasFactory;
    protected $table = 'lelangs';
    protected $fillable = [
        'barangs_id',
        'users_id',
        'harga_akhir',
        'tanggal',
        'status'
    ];

    public function barang()
    {
        return $this->hasOne('App\Models\barang', 'id', 'barangs_id');
    }

    public function history()
    {
        return $this->belongsTo(history::class);
    }
}
