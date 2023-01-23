<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Barang extends Model
{
    use HasFactory;
    // use SoftDeletes;
    protected $table = "barang";
    protected $fillable = ['kode_barang', 'nama_barang', 'id_kategori', 'id_merk', 'id_warna','angka_size', 'id_size', 'stock'];
    // protected $dates = ['deleted_at'];

    // public function kategori(){
    //     return $this->belongsTo('App\Kategori');
    // }

    public function barangMasuk() {
        return $this->hasMany('App\Models\BarangMasuk');
    }
    public function barangKeluar() {
        return $this->hasMany('App\Models\BarangKeluar');
    }
    public function retur() {
        return $this->hasMany('App\Models\Retur');
    }
}
