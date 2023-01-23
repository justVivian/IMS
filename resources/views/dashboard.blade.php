@extends('layouts.app')
@section('title', 'Dashboard')

@section('content-title')
Dashboard
@endsection

@section('content')
<div class="container">
    <!-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div> -->
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                Barang di Gudang : <?= $data['jumlah_barang'] ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                Barang Masuk Hari Ini : <?= $data['masuk'] ?>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                Barang Keluar Hari Ini : <?= $data['keluar'] ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                Barang Retur Hari Ini : <?= $data['retur'] ?>
            </div>
        </div>
    </div>
</div>
@endsection