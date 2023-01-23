<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Warna;

class WarnaController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:warna-list|warna-create|warna-edit|warna-delete', ['only' => ['index']]);
         $this->middleware('permission:warna-create', ['only' => ['tambah','store']]);
         $this->middleware('permission:warna-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:warna-delete', ['only' => ['delete']]);
    }

    public function index() {
        $warna = Warna::paginate(5);

        return view('datamaster.warna.warna', ['warna' => $warna]);
    }

    public function search(Request $request) {
        $search = $request->search;

        $warna = Warna::where('warna_name', 'like', '%'.$search.'%')->paginate(5);

        return view('datamaster.warna.warna', ['warna' => $warna]);
    }

    public function tambah() {
        return view('datamaster.warna.warna_tambah');
    } 

    public function store(Request $request)
    {
    	$this->validate($request,[
    		'warna_name' => 'required',
    	]);
 
        Warna::create([
    		'warna_name' => $request->warna_name,
    	]);
 
    	return redirect('/warna');
    }

    public function edit($id) {
        $warna = Warna::find($id);
        return view('datamaster.warna.warna_edit', ['warna' => $warna]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
        'warna_name' => 'required',
        ]);
    
        $warna = Warna::find($id);
        $warna->warna_name = $request->warna_name;
        $warna->save();
        return redirect('/warna');
    }

    public function delete($id) {
        $warna = Warna::find($id);
        $warna->delete();
        return redirect('/warna');
    }

    public function trash() {
        $warna = Warna::onlyTrashed()->get();
        return view('datamaster.warna.warna_trash', ['warna' => $warna]);
    }

    public function kembalikan($id) {
        $warna = Warna::onlyTrashed()->where('id',$id);
        $warna->restore();
        return redirect('/warna/trash');
    }

    public function kembalikan_semua() {
        $warna = Warna::onlyTrashed();
        $warna->restore();
        return redirect('/warna/trash');
    }

    public function hapus_permanen($id) {
        $warna = Warna::onlyTrashed()->where('id',$id);
        $warna->forceDelete();
        return redirect('/warna/trash');
    }

    public function hapus_permanen_semua() {
        $warna = Warna::onlyTrashed();
        $warna->forceDelete();
        return redirect('/warna/trash');
    }
}
