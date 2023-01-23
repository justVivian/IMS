
@extends('layouts.app')
@section('title', 'Data Master | Kategori')

@section('content-css')

@endsection

@section('content-title')
<p class="page-title">Edit Data Master Kategori</p>
@endsection

@section('content')
<div class="container">
    
    <form method="post" action="/kategori/update/{{ $kategori->id }}">

        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <div class="form-group">
            <label>Kategori</label>
            <input type="text" name="kategori_name" class="form-control input-form" placeholder="Nama kategori .." value=" {{ $kategori->kategori_name }}">

            @if($errors->has('kategori_name'))
                <div class="text-danger">
                    {{ $errors->first('kategori_name')}}
                </div>
            @endif

        </div>



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