<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;
    protected $table = "barang_keluar";
    protected $fillable = ['barang_id', 'stock_keluar', 'tanggal_keluar', 'user_id'];
    
    public function barang() {
        return $this->belongsTo('App\Models\Barang');
    }
    public function retur() {
        return $this->hasMany('App\Models\Retur');
    }
}
