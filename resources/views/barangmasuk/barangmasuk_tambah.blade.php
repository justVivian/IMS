
@extends('layouts.app')
@section('title', 'Stok Barang Masuk')

@section('content-css')
.barang-form {
    width:100% !important;
}
@endsection

@section('content-title')
<p class="page-title">Edit Stok Barang Masuk</p>
@endsection

@section('content')
<div class="container">
    
    <form method="post" action="/barang-masuk/store">

        {{ csrf_field() }}

        <div class="row">
            <div class="form-group col-lg-4 col-md-6 col-sm-12">
                <label>Tanggal Masuk</label>
                <input type="date" name="tanggal_masuk" class="form-control input-form barang-form" placeholder="Tanggal Masuk ..">

                @if($errors->has('tanggal_masuk'))
                    <div class="text-danger">
                        {{ $errors->first('tanggal_masuk')}}
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
                <label>Stock Masuk</label>
                <input type="text" name="stock_masuk" class="form-control input-form barang-form" placeholder="Stock Masuk ..">
                
                @if($errors->has('stock_masuk'))
                    <div class="text-danger">
                        {{ $errors->first('stock_masuk')}}
                    </div>
                @endif

            </div>
        </div>

        <div class="container" style="margin-top: 100px;">
            <div class="row d-flex justify-content-between">
                <a href="/barang-masuk" class="btn btn-kembali">Kembali</a>
            
                <div class="form-group div-simpan">
                    <input type="submit" class="btn btn-success btn-custom" value="Simpan">
                </div>
            </div>
        </div>

    </form>
</div>
@endsection