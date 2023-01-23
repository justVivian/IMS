
@extends('layouts.app')
@section('title', 'Data Master | Merk')

@section('content-css')

@endsection

@section('content-title')
<p class="page-title">Edit Data Master Merk</p>
@endsection

@section('content')
<div class="container">
    
    <form method="post" action="/merk/update/{{ $merk->id }}">

        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <div class="form-group">
            <label>Merk</label>
            <input type="text" name="merk_name" class="form-control input-form" placeholder="Nama merk .." value=" {{ $merk->merk_name }}">

            @if($errors->has('merk_name'))
                <div class="text-danger">
                    {{ $errors->first('merk_name')}}
                </div>
            @endif

        </div>



        <div class="container" style="margin-top: 100px;">
            <div class="row d-flex justify-content-between">
                <a href="/merk" class="btn btn-kembali">Kembali</a>
            
                <div class="form-group div-simpan">
                    <input type="submit" class="btn btn-success btn-custom" value="Simpan">
                </div>
            </div>
        </div>

    </form>
</div>
@endsection