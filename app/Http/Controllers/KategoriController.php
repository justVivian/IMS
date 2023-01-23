<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Kategori;

class KategoriController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:kategori-list|kategori-create|kategori-edit|kategori-delete', ['only' => ['index']]);
         $this->middleware('permission:kategori-create', ['only' => ['tambah','store']]);
         $this->middleware('permission:kategori-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:kategori-delete', ['only' => ['delete']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $kategori = Kategori::paginate(5);

        return view('datamaster.kategori.kategori', ['kategori' => $kategori]);
    }

    public function search(Request $request) {
        $search = $request->search;

        $kategori = Kategori::where('kategori_name', 'like', '%'.$search.'%')->paginate(5);

        return view('datamaster.kategori.kategori', ['kategori' => $kategori]);
    }

    public function tambah() {
        return view('datamaster.kategori.kategori_tambah');
    } 

    public function store(Request $request)
    {
    	$this->validate($request,[
    		'kategori_name' => 'required',
    	]);
 
        Kategori::create([
    		'kategori_name' => $request->kategori_name,
    	]);
 
    	return redirect('/kategori');
    }

    public function edit($id) {
        $kategori = Kategori::find($id);
        return view('datamaster.kategori.kategori_edit', ['kategori' => $kategori]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
        'kategori_name' => 'required',
        ]);
    
        $kategori = Kategori::find($id);
        $kategori->kategori_name = $request->kategori_name;
        $kategori->save();
        return redirect('/kategori');
    }

    public function delete($id) {
        $kategori = Kategori::find($id);
        $kategori->delete();
        return redirect('/kategori');
    }

    public function trash() {
        $kategori = Kategori::onlyTrashed()->get();
        return view('datamaster.kategori.kategori_trash', ['kategori' => $kategori]);
    }

    public function kembalikan($id) {
        $kategori = Kategori::onlyTrashed()->where('id',$id);
        $kategori->restore();
        return redirect('/kategori/trash');
    }

    public function kembalikan_semua() {
        $kategori = Kategori::onlyTrashed();
        $kategori->restore();
        return redirect('/kategori/trash');
    }

    public function hapus_permanen($id) {
        $kategori = Kategori::onlyTrashed()->where('id',$id);
        $kategori->forceDelete();
        return redirect('/kategori/trash');
    }

    public function hapus_permanen_semua() {
        $kategori = Kategori::onlyTrashed();
        $kategori->forceDelete();
        return redirect('/kategori/trash');
    }
}
