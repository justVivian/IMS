@extends('layouts.app')
@section('title', 'Home')

@section('content-css')
.dashboard-card {
    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    border-radius: 10px;
    height: fit-content;
    display: flex;
    justify-content: space-between;
    padding:20px;
    margin-bottom: 30px;
    color: #000000;
}

.db-title {
    font-weight: 400;
    font-size: 24px;
    line-height: 36px;
    color: #000000;
}

.db-subtitle {
    font-weight: 300;
    font-size: 14px;
    line-height: 21px;
    color: #494949;
}

.db-count {
    font-weight: 500;
    font-size: 64px;
    line-height: 96px;
    color: #000000;
}
@endsection

@section('content-title')
<p class="page-title">Dashboard</p>
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
            <a href="/barang">
                <div class="card dashboard-card" style="background: #BFDCFF;">
                    <p class="db-title">Stok Barang</p>
                    <p class="db-subtitle">Hampir Habis</p>
                    <p class="db-count"><?= $data['jumlah_barang'] ?></p>
                </div>
            </a>
        </div>
        <div class="col-md-6">
            <a href="/barang-masuk">
                <div class="card dashboard-card" style="background: #FFEF77;">
                    <p class="db-title"> Barang Masuk  </p>
                    <p class="db-subtitle">Hari Ini</p>
                    <p class="db-count"><?= $data['masuk'] ?></p>
                </div>
            </a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <a href="/barang-keluar">
                <div class="card dashboard-card" style="background: #B5FFA9;">
                    <p class="db-title"> Barang Keluar </p>
                    <p class="db-subtitle">Hari Ini</p>
                    <p class="db-count"><?= $data['keluar'] ?></p>
                </div>
            </a>
        </div>
        <div class="col-md-6">
            <a href="/retur">
                <div class="card dashboard-card" style="background: #a9acff;">
                    <p class="db-title"> Barang Retur </p>
                    <p class="db-subtitle">Hari Ini</p>
                    <p class="db-count"><?= $data['retur'] ?></p>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
