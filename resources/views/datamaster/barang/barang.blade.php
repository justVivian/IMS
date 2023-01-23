
@extends('layouts.app')
@section('title', 'Barang')

@section('content-css')

@endsection

@section('content-title')
<p class="page-title">Barang</p>
<div class="container">
    <div class="row d-flex" style="justify-content: space-between;">

        <form action="/barang/search" method="GET">
            <div class="form-group">
                <input type="text" id="search-bar" name="search" placeholder="Search .." value="{{ old('search') }}">
                <input type="submit" id="search-submit" class="btn btn-success" value="SEARCH" style="display:none;">
            </div>
        </form>
        @can('barang-create')
        <a href="/barang/tambah" class="btn btn-primary btn-custom">Tambah Stok Barang</a>
        @endcan
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <!-- |
    <a href="/kategori/trash">Tong Sampah</a> -->
    <br>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Merk</th>
                <th>Warna</th>
                <th>Size</th>
                <th>Stock</th>
                <!-- <th>Harga Satuan</th> -->
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach($barang as $p)
            <tr>
                <td>{{ $i }}</td>    
                <td>{{ $p->kode_barang }}</td>
                <td>{{ $p->nama_barang }}</td>
                <td>{{ $p->kategori_name }}</td>
                <td>{{ $p->merk_name }}</td>
                <td>{{ $p->warna_name }}</td>
                <td>{{ $p->angka_size }} {{ $p->size_satuan }}</td>
                <td>{{ $p->stock }}</td>
                <!-- <td>{{ $p->harga_satuan }}</td> -->
                <td class="text-center">
                    @can('barang-edit')
                    <a href="/barang/edit/{{ $p->id }}" class="btn"><img src="{{ asset('storage/pen-square.svg') }}" alt=""></a>
                    @endcan
                    @can('barang-delete')
                    <a href="/barang/hapus/{{ $p->id }}" class="btn delete-confirm"><img src="{{ asset('storage/Delete.svg') }}" alt=""></a>
                    @endcan
                </td>
            </tr>
            <?php $i++; ?>
            @endforeach
        </tbody>
    </table>
    <div class="row justify-content-center">
        {{ $barang->links() }}
    </div>
</div>
@endsection