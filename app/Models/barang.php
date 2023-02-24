<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\lelang;
use App\Models\history;

class barang extends Model
{
    use HasFactory;
    protected $table = 'barangs';
    protected $fillable = [
        'nama_barang',
        'tanggal',
        'harga_awal',
        'deskripsi_barang',
        'image'
    ];

    public function lelang()
    {
        return $this->belongsTo(lelang::class);
    }

    public function history()
    {
        return $this->belongsTo(history::class);
    }
}
