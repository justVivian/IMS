<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Barang;
// use App\Models\BarangMasuk;
use App\Models\BarangKeluar;

use Session;

class BarangKeluarController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:keluar-list|keluar-create|keluar-edit|keluar-delete', ['only' => ['index']]);
         $this->middleware('permission:keluar-create', ['only' => ['tambah','store']]);
         $this->middleware('permission:keluar-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:keluar-delete', ['only' => ['delete']]);
    }

    public function index() {
        // $barang = Barang::all();
        $barang_keluar = BarangKeluar::orderBy('id','DESC')->paginate(5);

        return view('barangkeluar.barangkeluar', ['barang_keluar' => $barang_keluar]);
    }

    public function search(Request $request) {
        $search = $request->search;

        $barang_keluar = BarangKeluar::join('barang', 'barang_keluar.barang_id', '=', 'barang.id')
        ->where('kode_barang', 'like', '%'.$search.'%')
        ->orWhere('nama_barang', 'like', '%'.$search.'%')->paginate(5);

        return view('barangkeluar.barangkeluar', ['barang_keluar' => $barang_keluar]);
    }


    public function tambah() {
        $barang = Barang::all();

        return view('barangkeluar.barangkeluar_tambah', ['barang' => $barang]);
    } 

    public function store(Request $request)
    {
        // echo $request;
    	$this->validate($request,[
    		'id_barang' => 'required',
            'stock_keluar' => 'required',
            'tanggal_keluar' => 'required',
    	]);

        $barang = Barang::find($request->id_barang);
        if($barang->stock >= $request->stock_keluar) {
             
            BarangKeluar::create([
                'barang_id' => $request->id_barang,
                'stock_keluar' => $request->stock_keluar,
                'tanggal_keluar' => $request->get('tanggal_keluar'),
            ]);

            $barang->stock -= $request->stock_keluar;  
            $barang->save();
 
            return redirect('/barang-keluar');
        }
        else {
            return redirect('/barang-keluar/store/gagal');
        }
     
    }

    public function gagal() {
        Session::flash('gagal','Stock barang tidak mencukupi');
        return redirect('/barang-keluar/tambah');
    }

    public function edit($id) {
        $barang_keluar = BarangKeluar::find($id);
        $barang = Barang::all();
        return view('barangkeluar.barangkeluar_edit', ['barang_keluar' => $barang_keluar, 'barang' => $barang]);
    }

    public function update($id, Request $request)
    {
        $stock_keluar_before = BarangKeluar::find($id)->stock_keluar;

        $this->validate($request,[
  		    'id_barang' => 'required',
            'stock_keluar' => 'required',
            'tanggal_keluar' => 'required',
        ]);

        $barang_keluar = BarangKeluar::find($id);
    
        $barang = Barang::find($request->id_barang);
        if($stock_keluar_before < $request->stock_keluar) {
            if($request->stock_keluar > $barang->stock) {
                return redirect('/barang-keluar/store/gagal2/'.$id);
            }
            else {
                $barang_keluar->barang_id = $request->id_barang;
                $barang_keluar->tanggal_keluar = $request->tanggal_keluar;

                $selisih = $request->stock_keluar - $stock_keluar_before;
                $barang->stock -= $selisih;
                $barang_keluar->stock_keluar += $selisih;
            }
        }
        else if($stock_keluar_before > $request->stock_keluar) {
            $barang_keluar->barang_id = $request->id_barang;
            $barang_keluar->tanggal_keluar = $request->tanggal_keluar;

            $selisih = $stock_keluar_before - $request->stock_keluar ;
            $barang->stock += $selisih;
            $barang_keluar->stock_keluar -= $selisih;
        }
        else {
            $barang_keluar->barang_id = $request->id_barang;
            $barang_keluar->tanggal_keluar = $request->tanggal_keluar;
            
            $barang->stock = $barang->stock;
            $barang_keluar->stock_keluar = $request->stock_keluar;
        }
        $barang->save();
        $barang_keluar->save();
        return redirect('/barang-keluar');
    }

    public function gagal2($id) {
        Session::flash('gagal2','Stock barang tidak mencukupi');
        return redirect('/barang-keluar/edit/'.$id);
    }

    public function delete($id) {
        // $stock_masuk_before = BarangMasuk::find($id)->stock_masuk;
        $barang_keluar = BarangKeluar::find($id);
        $stock_keluar_before = $barang_keluar->stock_keluar;
        $barang_id = $barang_keluar->barang_id;
        $barang = Barang::find($barang_id);
        $barang->stock += $stock_keluar_before;
        $barang->save();
        $barang_keluar->delete();
        return redirect('/barang-keluar');
    }
}
