@extends('layouts.app')
@section('title', 'Data Master | Kategori')

@section('content-css')

@endsection

@section('content-title')
<p class="page-title">Tambah Data Master Kategori</p>
@endsection

@section('content')
<div class="container">
    
    <form method="post" action="/kategori/store">

        {{ csrf_field() }}

        <div class="form-group">
            <label>Kategori</label>
            <input type="text" name="kategori_name" class="form-control input-form" placeholder="Nama kategori ..">

            @if($errors->has('kategori_name'))
                <div class="text-danger">
                    {{ $errors->first('kategori_name')}}
                </div>
            @endif

        </div>

        <!-- <div class="form-group">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" placeholder="Alamat pegawai .."></textarea>

                @if($errors->has('alamat'))
                <div class="text-danger">
                    {{ $errors->first('alamat')}}
                </div>
            @endif

        </div> -->

        <div class="container" style="margin-top: 100px;">
            <div class="row d-flex justify-content-between">
                <a href="/kategori" class="btn btn-kembali">Kembali</a>
            
                <div class="form-group div-simpan">
                    <input type="submit" class="btn btn-success btn-custom" value="Simpan">
                </div>
            </div>
        </div>
    </form>

</div>
@endsection