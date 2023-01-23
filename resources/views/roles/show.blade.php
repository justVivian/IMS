
@extends('layouts.app')
@section('title', 'Manajemen Pekerja')

@section('content-css')

@endsection

@section('content-title')
<p class="page-title">Detail Manajemen Pekerja</p>
@endsection
@section('content')
<!-- <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show Role</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
        </div>
    </div>
</div> -->


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nama:</strong>
            {{ $role->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Permissions:</strong>
            @if(!empty($rolePermissions))
            <ul>
                @foreach($rolePermissions as $v)
                    <li class="">{{ $v->name }}</li>
                @endforeach
            </ul>
            @endif
        </div>
    </div>
</div>
<div class="container" style="margin-top: 100px;">
    <div class="row d-flex justify-content-between">
        <a href="{{ route('roles.index') }}" class="btn btn-custom">Kembali</a>
    </div>
</div>
@endsection