<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retur extends Model
{
    use HasFactory;
    protected $table = "retur";
    protected $fillable = ['barang_id', 'keluar_id', 'jumlah_retur','alasan', 'tanggal_retur', 'status'];
    
    public function barang() {
        return $this->belongsTo('App\Models\Barang');
    }

    public function keluar() {
        return $this->belongsTo('App\Models\BarangKeluar');
    }
}
