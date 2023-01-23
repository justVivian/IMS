
@extends('layouts.app')
@section('title', 'Barang')

@section('content-css')
.barang-form {
    width:100% !important;
}
@endsection

@section('content-title')
<p class="page-title">Edit Barang</p>
@endsection

@section('content')
<div class="container">
    
    <form method="post" action="/barang/update/{{ $barang->id }}">
 
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <div class="row">
        <div class="form-group col-lg-4 col-md-6 col-sm-12">
            <label>Kode Barang</label>
            <input type="text" name="kode_barang" class="form-control input-form barang-form" placeholder="Kode Barang .." value=" {{ $barang->kode_barang }}">

            @if($errors->has('kode_barang'))
                <div class="text-danger">
                    {{ $errors->first('kode_barang')}}
                </div>
            @endif

        </div>

        <div class="form-group col-lg-4 col-md-6 col-sm-12">
            <label>Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control input-form barang-form" placeholder="Nama Barang .." value=" {{ $barang->nama_barang }}">

            @if($errors->has('nama_barang'))
                <div class="text-danger">
                    {{ $errors->first('nama_barang')}}
                </div>
            @endif

        </div>

        <div class="form-group col-lg-4 col-md-6 col-sm-12">
            <label>Kategori</label>
            <select class="form-control input-form barang-form" id="kategori-option" name="id_kategori">
                @foreach ($kategori as $k)
                    <option value="{{ $k->id }}"
                    @if($barang->id_kategori == $k->id) selected @endif>{{ $k->kategori_name }}</option>
                @endforeach
            </select> 
            @if($errors->has('kategori_name'))
                <div class="text-danger">
                    {{ $errors->first('kategori_name')}}
                </div>
            @endif

        </div>

        <div class="form-group col-lg-4 col-md-6 col-sm-12">
            <label>Merk</label>
            <select class="form-control input-form barang-form" id="merk-option" name="id_merk">
                @foreach ($merk as $m)
                    <option value="{{ $m->id }}"
                    @if($barang->id_merk == $m->id) selected @endif>{{ $m->merk_name }}</option>
                @endforeach
            </select> 
            @if($errors->has('merk_name'))
                <div class="text-danger">
                    {{ $errors->first('merk_name')}}
                </div>
            @endif

        </div>

        <div class="form-group col-lg-4 col-md-6 col-sm-12">
            <label>Warna</label>
            <select class="form-control input-form barang-form" id="warna-option" name="id_warna" value=" {{ $barang->warna_name }}">
                @foreach ($warna as $w)
                    <option value="{{ $w->id }}"
                    @if($barang->id_warna == $w->id) selected @endif>{{ $w->warna_name }}</option>
                @endforeach
            </select> 
            @if($errors->has('warna_name'))
                <div class="text-danger">
                    {{ $errors->first('warna_name')}}
                </div>
            @endif

        </div>

        <div class="form-group col-lg-4 col-md-6 col-sm-12">
            <label>Size</label>
            <input type="text" name="angka_size" class="form-control input-form barang-form" placeholder="size .." value=" {{ $barang->angka_size }}">
            
            @if($errors->has('angka_size'))
                <div class="text-danger">
                    {{ $errors->first('angka_size')}}
                </div>
            @endif

        </div>

        <div class="form-group col-lg-4 col-md-6 col-sm-12">
            <label>Satuan</label>
            <select class="form-control input-form barang-form" id="size-option" name="id_size">
                @foreach ($size as $s)
                    <option value="{{ $s->id }}"
                    @if($barang->id_size == $s->id) selected @endif>{{ $s->size_satuan }}</option>
                @endforeach
            </select> 
            @if($errors->has('size_satuan'))
                <div class="text-danger">
                    {{ $errors->first('size_satuan')}}
                </div>
            @endif

        </div>

        <div class="form-group col-lg-4 col-md-6 col-sm-12">
            <label>Stock</label>
            <input type="text" name="stock" class="form-control input-form barang-form" placeholder="Stock .." value=" {{ $barang->stock }}">

            @if($errors->has('stock'))
                <div class="text-danger">
                    {{ $errors->first('stock')}}
                </div>
            @endif

        </div>
        </div>


        <div class="container" style="margin-top: 100px;">
            <div class="row d-flex justify-content-between">
                <a href="/barang" class="btn btn-kembali">Kembali</a>
            
                <div class="form-group div-simpan">
                    <input type="submit" class="btn btn-success btn-custom" value="Simpan">
                </div>
            </div>
        </div>

    </form>
</div>
@endsection