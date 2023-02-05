<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lelang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    protected $fillable = [
        'barang_id',
        'tanggal',
        'harga_akhir',
        'status'
    ];
}
