<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Size;

class SizeController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:size-list|size-create|size-edit|size-delete', ['only' => ['index']]);
         $this->middleware('permission:size-create', ['only' => ['tambah','store']]);
         $this->middleware('permission:size-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:size-delete', ['only' => ['delete']]);
    }

    public function index() {
        $size = Size::paginate(5);

        return view('datamaster.size.size', ['size' => $size]);
    }

    public function search(Request $request) {
        $search = $request->search;

        $size = Size::where('size_satuan', 'like', '%'.$search.'%')->paginate(5);

        return view('datamaster.size.size', ['size' => $size]);
    }

    public function tambah() {
        return view('datamaster.size.size_tambah');
    } 

    public function store(Request $request)
    {
    	$this->validate($request,[
    		'size_satuan' => 'required',
    	]);
 
        Size::create([
    		'size_satuan' => $request->size_satuan,
    	]);
 
    	return redirect('/size');
    }

    public function edit($id) {
        $size = Size::find($id);
        return view('datamaster.size.size_edit', ['size' => $size]);
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
        'size_satuan' => 'required',
        ]);
    
        $size = Size::find($id);
        $size->size_satuan = $request->size_satuan;
        $size->save();
        return redirect('/size');
    }

    public function delete($id) {
        $size = Size::find($id);
        $size->delete();
        return redirect('/size');
    }

    public function trash() {
        $size = Size::onlyTrashed()->get();
        return view('datamaster.size.size_trash', ['size' => $size]);
    }

    public function kembalikan($id) {
        $size = Size::onlyTrashed()->where('id',$id);
        $size->restore();
        return redirect('/size/trash');
    }

    public function kembalikan_semua() {
        $size = Size::onlyTrashed();
        $size->restore();
        return redirect('/size/trash');
    }

    public function hapus_permanen($id) {
        $size = Size::onlyTrashed()->where('id',$id);
        $size->forceDelete();
        return redirect('/size/trash');
    }

    public function hapus_permanen_semua() {
        $size = Size::onlyTrashed();
        $size->forceDelete();
        return redirect('/size/trash');
    }
}
