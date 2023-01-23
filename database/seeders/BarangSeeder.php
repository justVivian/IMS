<?php

namespace Database\Seeders;
use DB;

use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('barang')->insert([
        	'kode_barang' => 'AAC0123',
        	'nama_barang' => 'nsjfnbjawf',
        	'id_kategori' => 2,
            'id_merk' => 2,
            'id_warna' => 5,
            'angka_size' => 5,
            'id_size' => 5,
            'harga_satuan' => 2500
        ]);
    }
}
