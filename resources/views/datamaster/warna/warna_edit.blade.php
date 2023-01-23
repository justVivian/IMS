
@extends('layouts.app')
@section('title', 'Data Master | Warna')

@section('content-css')

@endsection

@section('content-title')
<p class="page-title">Edit Data Master Warna</p>
@endsection

@section('content')
<div class="container">
    
    <form method="post" action="/warna/update/{{ $warna->id }}">

        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <div class="form-group">
            <label>Warna</label>
            <input type="text" name="warna_name" class="form-control input-form" placeholder="Nama warna .." value=" {{ $warna->warna_name }}">

            @if($errors->has('warna_name'))
                <div class="text-danger">
                    {{ $errors->first('warna_name')}}
                </div>
            @endif

        </div>



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