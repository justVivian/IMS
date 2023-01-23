<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Merk;

class MerkController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:merk-list|merk-create|merk-edit|merk-delete', ['only' => ['index']]);
         $this->middleware('permission:merk-create', ['only' => ['tambah','store']]);
         $this->middleware('permission:merk-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:merk-delete', ['only' => ['delete']]);
    }

    public function index() {
        $merk = Merk::paginate(5);

        return view('datamaster.merk.merk', ['merk' => $merk]);
    }

    public function search(Request $request) {
        $search = $request->search;

        $merk = Merk::where('merk_name', 'like', '%'.$search.'%')->paginate(5);

        return view('datamaster.merk.merk', ['merk' => $merk]);
    }

    public function tambah() {
        return view('datamaster.merk.merk_tambah');
    } 

    public function store(Request $request)
    {
    	$this->validate($request,[
    		'merk_name' => 'required',
    	]);
 
        Merk::create([
    		'merk_name' => $request->merk_name,
    	]);
 
    	return redirect('/merk');
    }

    public function edit($id) {
        $merk = Merk::find($id);
        return view('datamaster.merk.merk_edit', ['merk' => $merk]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
        'merk_name' => 'required',
        ]);
    
        $merk = Merk::find($id);
        $merk->merk_name = $request->merk_name;
        $merk->save();
        return redirect('/merk');
    }

    public function delete($id) {
        $merk = Merk::find($id);
        $merk->delete();
        return redirect('/merk');
    }

    public function trash() {
        $merk = Merk::onlyTrashed()->get();
        return view('datamaster.merk.merk_trash', ['merk' => $merk]);
    }

    public function kembalikan($id) {
        $merk = Merk::onlyTrashed()->where('id',$id);
        $merk->restore();
        return redirect('/merk/trash');
    }

    public function kembalikan_semua() {
        $merk = Merk::onlyTrashed();
        $merk->restore();
        return redirect('/merk/trash');
    }

    public function hapus_permanen($id) {
        $merk = Merk::onlyTrashed()->where('id',$id);
        $merk->forceDelete();
        return redirect('/merk/trash');
    }

    public function hapus_permanen_semua() {
        $merk = Merk::onlyTrashed();
        $merk->forceDelete();
        return redirect('/merk/trash');
    }
}
