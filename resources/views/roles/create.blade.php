
@extends('layouts.app')
@section('title', 'Manajemen Pekerja')

@section('content-css')

@endsection

@section('content-title')
<p class="page-title">Tambah Manajemen Pekerja</p>
@endsection

@section('content')
<!-- <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create New Role</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
        </div>
    </div>
</div> -->


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


{!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label><strong>Jabatan</strong></label>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 20px;">
        <div class="form-group">
            <label for=""><strong>Permission</strong></label>    
            <br/>
            <div class="row">
            @foreach($permission as $value)
                <div class="col-xs-12 col-sm-6 col-md-4 col lg-3">
                    <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                    {{ $value->name }}</label>
                </div>
            <br/>
            @endforeach
            </div>
        </div>
    </div>
    <!-- <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div> -->
</div>
<div class="container" style="margin-top: 100px;">
    <div class="row d-flex justify-content-between">
        <a href="{{ route('roles.index') }}" class="btn btn-kembali">Kembali</a>
    
        <div class="form-group div-simpan">
            <input type="submit" class="btn btn-success btn-custom" value="Tambah Pekerja">
        </div>
    </div>
</div>
{!! Form::close() !!}

@endsection