<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Merk;
use App\Models\Size;
use App\Models\Warna;

class BarangController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:barang-list|barang-create|barang-edit|barang-delete', ['only' => ['index']]);
         $this->middleware('permission:barang-create', ['only' => ['tambah','store']]);
         $this->middleware('permission:barang-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:barang-delete', ['only' => ['delete']]);
    }

    public function index() {
        // $barang = Barang::all();
        $barang = Barang::
        join('kategori', 'barang.id_kategori', '=', 'kategori.id')
        ->join('merk', 'barang.id_merk', '=', 'merk.id')
        ->join('warna', 'barang.id_warna', '=', 'warna.id')
        ->join('size', 'barang.id_size', '=', 'size.id')
        ->select(['barang.id', 'kode_barang', 'nama_barang', 'kategori_name', 'merk_name', 'warna_name', 'angka_size', 'size_satuan', 'stock'])
        ->paginate(5);

        return view('datamaster.barang.barang', ['barang' => $barang]);
    }

    public function search(Request $request) {
        $search = $request->search;

        $barang = Barang::
        join('kategori', 'barang.id_kategori', '=', 'kategori.id')
        ->join('merk', 'barang.id_merk', '=', 'merk.id')
        ->join('warna', 'barang.id_warna', '=', 'warna.id')
        ->join('size', 'barang.id_size', '=', 'size.id')
        ->where('kode_barang', 'like', '%'.$search.'%')
        ->orWhere('nama_barang', 'like', '%'.$search.'%')
        ->orWhere('kategori_name', 'like', '%'.$search.'%')
        ->orWhere('merk_name', 'like', '%'.$search.'%')
        ->orWhere('warna_name', 'like', '%'.$search.'%')
        ->orWhere('size_satuan', 'like', '%'.$search.'%')
        ->paginate(5);

        return view('datamaster.barang.barang', ['barang' => $barang]);
    }

    public function tambah() {
        $barang = Barang::all();
        $kategori = Kategori::all();
        $merk = Merk::all();
        $warna = Warna::all();
        $size = Size::all();

        return view('datamaster.barang.barang_tambah', ['barang' => $barang, 'kategori' => $kategori, 'merk' => $merk, 'warna' => $warna, 'size' => $size]);
    } 

    public function store(Request $request)
    {
        // echo $request;
    	$this->validate($request,[
    		'kode_barang' => 'required',
            'nama_barang' => 'required',
            'id_kategori' => 'required',
            'id_merk' => 'required',
            'id_warna' => 'required',
            'angka_size' => 'required',
            'id_size' => 'required',
            'stock' => 'required',
            // 'harga_satuan' => 'required',
    	]);
 
        Barang::create([
    		'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'id_kategori' => $request->get('id_kategori'),
            'id_merk' => $request->get('id_merk'),
            'id_warna' => $request->get('id_warna'),
            'angka_size' => $request->angka_size,
            'id_size' => $request->get('id_size'),
            'stock' => $request->stock,
            // 'harga_satuan' => $request->harga_satuan,
    	]);
 
    	return redirect('/barang');
    }

    public function edit($id) {
        $barang = Barang::find($id);
        $kategori = Kategori::all();
        $merk = Merk::all();
        $warna = Warna::all();
        $size = Size::all();
        return view('datamaster.barang.barang_edit', ['barang' => $barang, 'kategori' => $kategori, 'merk' => $merk, 'warna' => $warna, 'size' => $size]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'id_kategori' => 'required',
            'id_merk' => 'required',
            'id_warna' => 'required',
            'angka_size' => 'required',
            'id_size' => 'required',
            'stock' => 'required',
            // 'harga_satuan' => 'required',
        ]);
    
        $barang = Barang::find($id);
        $barang->kode_barang = $request->kode_barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->id_kategori = $request->get('id_kategori');
        $barang->id_merk = $request->get('id_merk');
        $barang->id_warna = $request->get('id_warna');
        $barang->angka_size = $request->angka_size;
        $barang->id_size = $request->get('id_size');
        $barang->stock = $request->stock;
        // $barang->harga_satuan = $request->harga_satuan;
        $barang->save();
        return redirect('/barang');
    }

    public function delete($id) {
        // $barang = DB::table('barang')->where('barang.id',$id);
        $barang = Barang::where('barang.id',$id);
        $barang->delete();
        return redirect('/barang');
    }

    public function trash() {
        $barang = Barang::onlyTrashed()
        ->join('kategori', 'barang.id_kategori', '=', 'kategori.id')
        ->join('merk', 'barang.id_merk', '=', 'merk.id')
        ->join('warna', 'barang.id_warna', '=', 'warna.id')
        ->join('size', 'barang.id_size', '=', 'size.id')->orderBy('barang.id')
        ->get(['barang.id', 'kode_barang', 'nama_barang', 'kategori_name', 'merk_name', 'warna_name', 'angka_size', 'size_satuan', 'stock']);
        return view('datamaster.barang.barang_trash', ['barang' => $barang]);
    }

    public function kembalikan($id) {
        $barang = Barang::onlyTrashed()->where('id',$id);
        $barang->restore();
        return redirect('/barang/trash');
    }

    public function kembalikan_semua() {
        $barang = Barang::onlyTrashed();
        $barang->restore();
        return redirect('/barang/trash');
    }

    public function hapus_permanen($id) {
        $barang = Barang::onlyTrashed()->where('id',$id);
        $barang->forceDelete();
        return redirect('/barang/trash');
    }

    public function hapus_permanen_semua() {
        $barang = Barang::onlyTrashed();
        $barang->forceDelete();
        return redirect('/barang/trash');
    }
}
