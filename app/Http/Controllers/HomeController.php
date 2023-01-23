<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use App\Models\Retur;

use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jumlah_barang = Barang::where('stock','<=',5)->count();
        $current_date = Carbon::today();

        $masuk = BarangMasuk::whereDate('tanggal_masuk', $current_date)->get();
        $keluar = BarangKeluar::whereDate('tanggal_keluar', $current_date)->get();
        $retur = Retur::whereDate('tanggal_retur', $current_date)->get();

        $data = array(
            'jumlah_barang' => $jumlah_barang,
            'masuk' => $masuk->count(),
            'keluar' => $keluar->count(),
            'retur' => $retur->count(),
        );

        return view('home',compact('data'));
    }
}
