
@extends('layouts.app')
@section('title', 'Data Master | Size')

@section('content-css')

@endsection

@section('content-title')
<p class="page-title">Tambah Data Master Size</p>
@endsection

@section('content')
<div class="container">
    
    <form method="post" action="/size/store">

        {{ csrf_field() }}

        <div class="form-group">
            <label>Size</label>
            <input type="text" name="size_satuan" class="form-control input-form" placeholder="Nama size ..">

            @if($errors->has('size_satuan'))
                <div class="text-danger">
                    {{ $errors->first('size_satuan')}}
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
                <a href="/size" class="btn btn-kembali">Kembali</a>
            
                <div class="form-group div-simpan">
                    <input type="submit" class="btn btn-success btn-custom" value="Simpan">
                </div>
            </div>
        </div>
    </form>

</div>
@endsection