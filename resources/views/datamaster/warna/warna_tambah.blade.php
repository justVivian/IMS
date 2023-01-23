
@extends('layouts.app')
@section('title', 'Data Master | Warna')

@section('content-css')

@endsection

@section('content-title')
<p class="page-title">Tambah Data Master Warna</p>
@endsection

@section('content')
<div class="container">
    
    <form method="post" action="/warna/store">

        {{ csrf_field() }}

        <div class="form-group">
            <label>Warna</label>
            <input type="text" name="warna_name" class="form-control input-form" placeholder="Nama warna ..">

            @if($errors->has('warna_name'))
                <div class="text-danger">
                    {{ $errors->first('warna_name')}}
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
                <a href="/warna" class="btn btn-kembali">Kembali</a>
            
                <div class="form-group div-simpan">
                    <input type="submit" class="btn btn-success btn-custom" value="Simpan">
                </div>
            </div>
        </div>
    </form>

</div>
@endsection