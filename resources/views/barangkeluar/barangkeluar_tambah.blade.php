
@extends('layouts.app')
@section('title', 'Stok Barang Keluar')

@section('content-css')
.barang-form {
    width:100% !important;
}
@endsection

@section('content-title')
<p class="page-title">Edit Stok Barang Keluar</p>
@endsection

@section('content')
<div class="container">
    @if ($message = Session::get('gagal'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
    </div>
    @endif
    
    <form method="post" action="/barang-keluar/store">

        {{ csrf_field() }}

        <div class="row">

            <div class="form-group col-lg-4 col-md-6 col-sm-12">
                <label>Tanggal Masuk</label>
                <input type="date" name="tanggal_keluar" class="form-control input-form barang-form" placeholder="Tanggal Keluar ..">

                @if($errors->has('tanggal_keluar'))
                    <div class="text-danger">
                        {{ $errors->first('tanggal_keluar')}}
                    </div>
                @endif

            </div>

            <div class="form-group col-lg-4 col-md-6 col-sm-12">
                <label>Barang</label>
                <select class="form-control input-form barang-form" id="barang-option" name="id_barang">
                    @foreach ($barang as $b)
                        <option value="{{ $b->id }}">{{ $b->kode_barang }} {{ $b->nama_barang }}</option>
                    @endforeach
                </select> 
                    @if($errors->has('nama_barang'))
                    <div class="text-danger">
                        {{ $errors->first('nama_barang')}}
                    </div>
                @endif

            </div>

            <div class="form-group col-lg-4 col-md-6 col-sm-12">
                <label>Stock Keluar</label>
                <input type="text" name="stock_keluar" class="form-control input-form barang-form" placeholder="Stock Keluar ..">
                
                @if($errors->has('stock_keluar'))
                    <div class="text-danger">
                        {{ $errors->first('stock_keluar')}}
                    </div>
                @endif

            </div>
        </div>

        <div class="container" style="margin-top: 100px;">
            <div class="row d-flex justify-content-between">
                <a href="/barang-keluar" class="btn btn-kembali">Kembali</a>
            
                <div class="form-group div-simpan">
                    <input type="submit" class="btn btn-success btn-custom" value="Simpan">
                </div>
            </div>
        </div>

    </form>
</div>
@endsection