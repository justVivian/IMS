
@extends('layouts.app')
@section('title', 'Manajemen Pengguna')

@section('content-css')
.barang-form {
    width:100% !important;
}
@endsection

@section('content-title')
<p class="page-title">Tambah Manajemen Pengguna</p>
@endsection

@section('content')
<!-- <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create New User</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
        </div>
    </div>
</div>
 -->

@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif



{!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <label><strong>Name:</strong></label>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control input-form barang-form')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <label><strong>Email:</strong></label>
            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control input-form barang-form')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <label><strong>Password:</strong></label>
            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control input-form barang-form')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <label><strong>Confirm Password:</strong></label>
            {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control input-form barang-form')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <label><strong>Role:</strong></label>
            {!! Form::select('roles[]', $roles,[], array('class' => 'form-control input-form barang-form','multiple')) !!}
        </div>
    </div>
    <!-- <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div> -->
</div>
<div class="container" style="margin-top: 100px;">
    <div class="row d-flex justify-content-between">
        <a href="{{ route('users.index') }}" class="btn btn-kembali">Kembali</a>
    
        <div class="form-group div-simpan">
            <input type="submit" class="btn btn-success btn-custom" value="Tambah Pengguna">
        </div>
    </div>
</div>
{!! Form::close() !!}

@endsection