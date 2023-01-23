@extends('layouts.app')
@section('title', 'Manajemen Pengguna')

@section('content-css')
.status-success {
    color: #5C89BD;
    font-weight: 600;
}
.status-danger {
    font-weight: 600;
}
@endsection

@section('content-title')
<p class="page-title">Detail Manajemen Pengguna</p>
@endsection

@section('content')
<!-- <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show User</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
        </div>
    </div>
</div> -->


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $user->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {{ $user->email }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Roles:</strong>
            @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $v)
                    <p class="status-success">{{ $v }}</p>
                @endforeach
            @endif
        </div>
    </div>
</div>
<div class="container" style="margin-top: 100px;">
    <div class="row d-flex justify-content-between">
        <a href="{{ route('users.index') }}" class="btn btn-custom">Kembali</a>
    </div>
</div>
@endsection