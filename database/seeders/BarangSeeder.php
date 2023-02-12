<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\barang;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $barang = [
            [
                'nama_barang' => 'Supra',
                'tanggal' => '2023-01-01',
                'harga_awal' => '80000000',
                'deskripsi_barang' => 'Mulus'
            ],
            [
                'nama_barang' => 'Beat',
                'tanggal' => '2023-01-01',
                'harga_awal' => '10000000',
                'deskripsi_barang' => 'Mulus'
            ],
        ];

        foreach ($barang as $key => $value) {
            barang::create($value);
        }
    }
}
