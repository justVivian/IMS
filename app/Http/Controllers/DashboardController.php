<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use App\Models\Retur;

use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index() {
        $jumlah_barang = Barang::all();
        $current_date = Carbon::today();

        $masuk = BarangMasuk::whereDate('tanggal_masuk', $current_date)->get();
        $keluar = BarangKeluar::whereDate('tanggal_keluar', $current_date)->get();
        $retur = Retur::whereDate('tanggal_retur', $current_date)->get();

        $data = array(
            'jumlah_barang' => count($jumlah_barang),
            'masuk' => $masuk->count(),
            'keluar' => $keluar->count(),
            'retur' => $retur->count(),
        );

        return view('dashboard',compact('data'));
    }
}
