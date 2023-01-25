
@extends('layouts.app')
@section('title', 'Retur')

@section('content-css')
.barang-form {
    width:100% !important;
}
@endsection

@section('content-title')
<p class="page-title">Tambah Barang Retur</p>
@endsection

@section('content')
<div class="container">
    @if ($message = Session::get('gagal'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
    </div>
    @endif

    @if ($message = Session::get('gagal4'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
    </div>
    @endif
    
    <form method="post" action="/retur/store">
    
    {{ csrf_field() }}

        <div class="row">
        <div class="form-group col-lg-4 col-md-6 col-sm-12">
            <label>Barang Keluar</label>
            <select class="form-control input-form barang-form" id="barangkeluar-option" name="id_keluar">
                @foreach ($barang_keluar as $b)
                    <option value="{{ $b->id }}">{{ $b->tanggal_keluar }} {{ $b->barang->nama_barang }} {{ $b->stock_keluar }}</option>
                @endforeach
            </select> 
                @if($errors->has('nama_barang'))
                <div class="text-danger">
                    {{ $errors->first('nama_barang')}}
                </div>
            @endif

        </div>

        <div class="form-group col-lg-4 col-md-6 col-sm-12">
            <label>Tanggal Retur</label>
            <input type="date" name="tanggal_retur" class="form-control input-form barang-form" placeholder="Tanggal Retur ..">

            @if($errors->has('tanggal_retur'))
                <div class="text-danger">
                    {{ $errors->first('tanggal_retur')}}
                </div>
            @endif

        </div>

        <div class="form-group col-lg-4 col-md-6 col-sm-12">
            <label>Jumlah Retur</label>
            <input type="text" name="jumlah_retur" class="form-control input-form barang-form" placeholder="Jumlah Retur ..">
            
            @if($errors->has('jumlah_retur'))
                <div class="text-danger">
                    {{ $errors->first('jumlah_retur')}}
                </div>
            @endif

        </div>

        <div class="form-group col-lg-4 col-md-6 col-sm-12">
            <label>Alasan</label>
            <textarea name="alasan" class="form-control input-form barang-form" placeholder="Alasan .."></textarea>
            
            @if($errors->has('alasan'))
                <div class="text-danger">
                    {{ $errors->first('alasan')}}
                </div>
            @endif

        </div>

        <div class="form-group col-lg-4 col-md-6 col-sm-12">
            <label>Status</label>
            <select class="form-control input-form barang-form" id="status-option" name="status">
                <option value="1">Bisa kembali ke stok</option>
                <option value="2">Tidak bisa kembali ke stok</option>
            </select> 
                @if($errors->has('status-option'))
                <div class="text-danger">
                    {{ $errors->first('status-option')}}
                </div>
            @endif

        </div>
        </div>


        <div class="container" style="margin-top: 100px;">
            <div class="row d-flex justify-content-between">
                <a href="/retur" class="btn btn-kembali">Kembali</a>
            
                <div class="form-group div-simpan">
                    <input type="submit" class="btn btn-success btn-custom" value="Tambah Retur">
                </div>
            </div>
        </div>
    </form>
</div>
@endsection