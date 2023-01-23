
@extends('layouts.app')
@section('title', 'Stok Barang Masuk')

@section('content-css')

@endsection

@section('content-title')
<p class="page-title">Stok Barang Masuk</p>
<div class="container">
    <div class="row d-flex" style="justify-content: space-between;">

        <form action="/barang-masuk/search" method="GET">
            <div class="form-group">
                <input type="text" id="search-bar" name="search" placeholder="Search .." value="{{ old('search') }}">
                <input type="submit" id="search-submit" class="btn btn-success" value="SEARCH" style="display:none;">
            </div>
        </form>
        @can('masuk-create')
        <a href="/barang-masuk/tambah" class="btn btn-primary btn-custom">Tambah Stok Barang</a>
        @endcan
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <!-- |
    <a href="/kategori/trash">Tong Sampah</a> -->
    @if ($message = Session::get('gagal'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
    </div>
    @endif
    <br/>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Masuk</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Stok</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach($barang_masuk as $p)
            <tr>
                <td>{{ $i }}</td>    
                <td>{{ $p->tanggal_masuk }}</td>
                <td>{{ $p->barang->kode_barang }}</td>
                <td>{{ $p->barang->nama_barang }}</td>
                <td>{{ $p->stock_masuk }}</td>
                <td class="text-center">
                    @can('masuk-edit')
                    <a href="/barang-masuk/edit/{{ $p->id }}" class="btn"><img src="{{ asset('storage/pen-square.svg') }}" alt=""></a>
                    @endcan
                    @can('masuk-delete')
                    <a href="/barang-masuk/hapus/{{ $p->id }}" class="btn delete-confirm"><img src="{{ asset('storage/Delete.svg') }}" alt=""></a>
                    @endcan
                </td>
            </tr>
            <?php $i++; ?>
            @endforeach
        </tbody>
    </table>
    <div class="row justify-content-center">
        {{ $barang_masuk->links() }}
    </div>
</div>
@endsection