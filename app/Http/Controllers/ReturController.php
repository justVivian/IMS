<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Barang;
use App\Models\Retur;
use App\Models\BarangKeluar;

use Session;
use Carbon\Carbon;
use DateTime;

class ReturController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:retur-list|retur-create|retur-edit|retur-delete', ['only' => ['index']]);
         $this->middleware('permission:retur-create', ['only' => ['tambah','store']]);
         $this->middleware('permission:retur-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:retur-delete', ['only' => ['delete']]);
    }

    public function index() {
        // $barang = Barang::all();
        $retur = Retur::orderBy('id','DESC')->paginate(5);

        return view('retur.retur', ['retur' => $retur]);
    }

    public function search(Request $request) {
        $search = $request->search;

        $retur = Retur::join('barang', 'retur.barang_id', '=', 'barang.id')
        ->join('barang_keluar', 'retur.keluar_id', '=', 'barang_keluar.id')
        ->where('kode_barang', 'like', '%'.$search.'%')
        ->orWhere('nama_barang', 'like', '%'.$search.'%')
        ->orWhere('alasan', 'like', '%'.$search.'%')->paginate(5);

        return view('retur.retur', ['retur' => $retur]);
    }

    public function tambah() {
        $barang_keluar = BarangKeluar::all();
        $barang = Barang::all();

        return view('retur.retur_tambah', ['barang_keluar' => $barang_keluar, 'barang' => $barang]);
    } 

    public function store(Request $request)
    {
        // echo $request;
    	$this->validate($request,[
    		'id_keluar' => 'required',
            'tanggal_retur' => 'required',
            'jumlah_retur' => 'required',
            'alasan' => 'required',
            'status' => 'required',
    	]);
 
        $barang_keluar = BarangKeluar::find($request->id_keluar);
        $tanggal_retur = new Carbon($request->tanggal_retur);
        $tanggal_keluar = new Carbon($barang_keluar->tanggal_keluar);
        $selisih_hari = $tanggal_retur->diff($tanggal_keluar)->days ;

        // $barang = Barang::find($barang_keluar->id_barang);
        // echo ('aman');
        if($selisih_hari>3) {
            return redirect('/retur/store/gagal4');
        }
        else {
            if($request->jumlah_retur > $barang_keluar->stock_keluar) {
                return redirect('/retur/store/gagal');
            }
            else {                
                Retur::create([
                    'barang_id' => $barang_keluar->barang_id,
                    'keluar_id' => $request->id_keluar,
                    'jumlah_retur' => $request->jumlah_retur,
                    'alasan' => $request->get('alasan'),
                    'tanggal_retur' => $request->get('tanggal_retur'),
                    'status' => $request->get('status'),
                ]);
                if($request->status == 1) {
    

                    $barang = Barang::find($barang_keluar->barang_id);
                    $barang->stock += $request->jumlah_retur;
                    $barang->save();
                    
                    return redirect('/retur');
                }
                else {
                    return redirect('/retur');
                }
            }
        }

        return redirect('/retur');
    }

    public function gagal() {
        Session::flash('gagal','Jumlah retur melebihi jumlah barang yang dibeli');
        return redirect('/retur/tambah');
    }

    public function gagal4() {
        Session::flash('gagal4','Tidak bisa retur lebih dari 3 hari waktu pembelian');
        return redirect('/retur/tambah');
    }

    public function edit($id) {
        $retur = Retur::find($id);
        $barang_keluar = BarangKeluar::all();
        $barang = Barang::all();
        return view('retur.retur_edit', ['retur' => $retur, 'barang_keluar' => $barang_keluar, 'barang' => $barang]);
    }

    public function update($id, Request $request)
    {
        $retur = Retur::find($id);
        $stock_retur_before = $retur->jumlah_retur;

        $this->validate($request,[
            'id_keluar' => 'required',
            'tanggal_retur' => 'required',
            'jumlah_retur' => 'required',
            'alasan' => 'required',
            'status' => 'required',
        ]);

        $barang_keluar = BarangKeluar::find($request->id_keluar);
        $tanggal_retur = new Carbon($request->tanggal_retur);
        $tanggal_keluar = new Carbon($barang_keluar->tanggal_keluar);
        $selisih_hari = $tanggal_retur->diff($tanggal_keluar)->days ;

        if($selisih_hari>3) {
            return redirect('/retur/store/gagal5/'.$id);
        }
        else {
            if($request->jumlah_retur > $barang_keluar->stock_keluar) {
                return redirect('/retur/store/gagal2/'.$id);
            }
            else {
                $retur->barang_id = $barang_keluar->barang_id;
                $retur->keluar_id = $request->id_keluar;
                $retur->jumlah_retur = $request->jumlah_retur;
                $retur->alasan = $request->get('alasan');
                $retur->tanggal_retur = $request->get('tanggal_retur');
                $retur->status = $request->get('status');
                $retur->save();
                if($request->status == 1) {
                    
                    $barang = Barang::find($barang_keluar->barang_id);
                    $barang->stock += $request->jumlah_retur;
                    $barang->save();
                    
                    return redirect('/retur');
                }
                else {
                    return redirect('/retur');
                }
            }        
            // $retur->save();
        }
        return redirect('/retur');
    }

    public function gagal2($id) {
        Session::flash('gagal2','Jumlah retur melebihi jumlah barang yang dibeli');
        return redirect('/retur/edit/'.$id);
    }

    public function gagal5($id) {
        Session::flash('gagal5','Tidak bisa retur lebih dari 3 hari waktu pembelian');
        return redirect('/retur/edit/'.$id);
    }

    public function delete($id) {
        // $stock_masuk_before = BarangMasuk::find($id)->stock_masuk;
        $retur = Retur::find($id);
        $stock_retur_before = $retur->jumlah_retur;
        // $barang_id = $retur->barang_id;
        $barang = Barang::find($retur->barang_id);
        if($retur->status == 1) {
            if($barang->stock > $stock_retur_before) {
                $barang->stock -= $stock_retur_before;
            }
            else {
                return redirect('/retur/store/gagal3');
            }
        }
        $barang->save();
        $retur->delete();
        return redirect('/retur');
    }

    public function gagal3() {
        Session::flash('gagal3','Stock barang tidak mencukupi');
        return redirect('/retur');
    }
}
