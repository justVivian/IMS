<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\User;

use Session;

class BarangMasukController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:masuk-list|masuk-create|masuk-edit|masuk-delete', ['only' => ['index']]);
         $this->middleware('permission:masuk-create', ['only' => ['tambah','store']]);
         $this->middleware('permission:masuk-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:masuk-delete', ['only' => ['delete']]);
    }

    public function index() {
        // $barang = Barang::all();
        $barang_masuk = BarangMasuk::join('users', 'barang_masuk.user_id', '=', 'users.id')
        ->select(['barang_masuk.id', 'barang_id', 'stock_masuk', 'tanggal_masuk', 'name'])
        ->orderBy('barang_masuk.id','DESC')->paginate(5);

        return view('barangmasuk.barangmasuk', ['barang_masuk' => $barang_masuk]);
    }

    public function search(Request $request) {
        $search = $request->search;

        $barang_masuk = BarangMasuk::join('barang', 'barang_masuk.barang_id', '=', 'barang.id')
        ->join('users', 'barang_masuk.user_id', '=', 'users.id')
        ->where('kode_barang', 'like', '%'.$search.'%')
        ->orWhere('nama_barang', 'like', '%'.$search.'%')
        ->orWhere('name', 'like', '%'.$search.'%')->paginate(5);

        return view('barangmasuk.barangmasuk', ['barang_masuk' => $barang_masuk]);
    }

    public function tambah() {
        $barang = Barang::all();
        $user = User::orderBy('name','asc')->get();

        return view('barangmasuk.barangmasuk_tambah', ['barang' => $barang, 'user' => $user]);
    } 

    public function store(Request $request)
    {
        // echo $request;
    	$this->validate($request,[
    		'id_barang' => 'required',
            'stock_masuk' => 'required',
            'tanggal_masuk' => 'required',
            'user_id' => 'required',
    	]);
 
        BarangMasuk::create([
    		'barang_id' => $request->id_barang,
            'stock_masuk' => $request->stock_masuk,
            'tanggal_masuk' => $request->get('tanggal_masuk'),
            'user_id' => $request->user_id,
    	]);

        $barang = Barang::find($request->id_barang);
        $barang->stock += $request->stock_masuk;
        $barang->save();
 
    	return redirect('/barang-masuk');
    }

    public function edit($id) {
        $barang_masuk = BarangMasuk::find($id);
        $barang = Barang::all();
        $user = User::orderBy('name','asc')->get();
        return view('barangmasuk.barangmasuk_edit', ['barang_masuk' => $barang_masuk, 'barang' => $barang, 'user' => $user]);
    }

    public function update($id, Request $request)
    {
        $stock_masuk_before = BarangMasuk::find($id)->stock_masuk;

        $this->validate($request,[
  		    'id_barang' => 'required',
            'stock_masuk' => 'required',
            'tanggal_masuk' => 'required',
            'user_id' => 'required',
        ]);

        $barang_masuk = BarangMasuk::find($id);
        $barang_masuk->barang_id = $request->id_barang;
        $barang_masuk->tanggal_masuk = $request->tanggal_masuk;
        $barang_masuk->user_id = $request->user_id;
    
        $barang = Barang::find($request->id_barang);
        if($stock_masuk_before < $request->stock_masuk) {
            $selisih = $request->stock_masuk - $stock_masuk_before;
            $barang->stock += $selisih;
            $barang_masuk->stock_masuk += $selisih;
        }
        else if($stock_masuk_before > $request->stock_masuk) {
            $selisih = $stock_masuk_before - $request->stock_masuk ;
            $barang->stock -= $selisih;
            $barang_masuk->stock_masuk -= $selisih;
        }
        else {
            $barang->stock = $barang->stock;
            $barang_masuk->stock_masuk = $request->stock_masuk;
        }
        $barang->save();
        $barang_masuk->save();
        return redirect('/barang-masuk');
    }

    public function delete($id) {
        // $stock_masuk_before = BarangMasuk::find($id)->stock_masuk;
        $barang_masuk = BarangMasuk::find($id);
        $stock_masuk_before = $barang_masuk->stock_masuk;
        $barang_id = $barang_masuk->barang_id;
        $barang = Barang::find($barang_id);
        if($barang->stock > $stock_masuk_before) {
            $barang->stock -= $stock_masuk_before;
        }
        else {
            return redirect('/barang-masuk/store/gagal');
        }
        $barang->save();
        $barang_masuk->delete();
        return redirect('/barang-masuk');
    }

    public function gagal() {
        Session::flash('gagal','Stock barang tidak mencukupi');
        return redirect('/barang-masuk');
    }
}
