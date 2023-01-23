
@extends('layouts.app')
@section('title', 'Barang Retur')

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
<p class="page-title">Barang Retur</p>
<div class="container">
    <div class="row d-flex" style="justify-content: space-between;">

        <form action="/retur/search" method="GET">
            <div class="form-group">
                <input type="text" id="search-bar" name="search" placeholder="Search .." value="{{ old('search') }}">
                <input type="submit" id="search-submit" class="btn btn-success" value="SEARCH" style="display:none;">
            </div>
        </form>
        @can('retur-create')
        <a href="/retur/tambah" class="btn btn-primary btn-custom">Tambah Barang</a>
        @endcan
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <!-- |
    <a href="/kategori/trash">Tong Sampah</a> -->
    @if ($message = Session::get('gagal3'))
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
                <th>Tanggal Keluar</th>
                <th>Tanggal Retur</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Jumlah Retur</th>
                <th>Alasan</th>
                <th>Status</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach($retur as $p)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $p->keluar->tanggal_keluar }}</td>
                <td>{{ $p->tanggal_retur }}</td>
                <td>{{ $p->barang->kode_barang }}</td>
                <td>{{ $p->barang->nama_barang }}</td>
                <td>{{ $p->jumlah_retur }}</td>
                <td>{{ $p->alasan }}</td>
                <td>@if( $p->status == 1)
                    <label class="status-success">Accepted
                    @else
                    <label class="text-danger status-danger">Not Accepted
                    @endif
                </label></td>
                <td class="text-center">
                    @can('retur-edit')
                    <a href="/retur/edit/{{ $p->id }}" class="btn"><img src="{{ asset('storage/pen-square.svg') }}" alt=""></a>
                    @endcan
                    @can('retur-delete')
                    <a href="/retur/hapus/{{ $p->id }}" class="btn delete-confirm"><img src="{{ asset('storage/Delete.svg') }}" alt=""></a>
                    @endcan
                </td>
            </tr>
            <?php $i++; ?>
            @endforeach
        </tbody>
    </table>
    <div class="row justify-content-center">
        {{ $retur->links() }}
    </div>
</div>
@endsection