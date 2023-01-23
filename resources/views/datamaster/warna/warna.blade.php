
@extends('layouts.app')
@section('title', 'Data Master | Warna')

@section('content-css')

@endsection

@section('content-title')
<p class="page-title">Data Master Warna</p>
<div class="container">
    <div class="row d-flex" style="justify-content: space-between;">

        <form action="/warna/search" method="GET">
            <div class="form-group">
                <input type="text" id="search-bar" name="search" placeholder="Search .." value="{{ old('search') }}">
                <input type="submit" id="search-submit" class="btn btn-success" value="SEARCH" style="display:none;">
            </div>
        </form>
        @can('warna-create')
        <a href="/warna/tambah" class="btn btn-primary btn-custom">Tambah Warna</a>
        @endcan
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <!-- |
    <a href="/kategori/trash">Tong Sampah</a> -->
    <br/>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Warna</th>
                <th></th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach($warna as $p)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $p->warna_name }}</td>
                <td></td>
                <td class="text-center">
                    @can('warna-edit')
                    <a href="/warna/edit/{{ $p->id }}" class="btn"><img src="{{ asset('storage/pen-square.svg') }}" alt=""></a>
                    @endcan
                    @can('merk-delete')
                    <a href="/warna/hapus/{{ $p->id }}" class="btn delete-confirm"><img src="{{ asset('storage/Delete.svg') }}" alt=""></a>
                    @endcan
                </td>
            </tr>
            <?php $i++; ?>
            @endforeach
        </tbody>
    </table>
    <div class="row justify-content-center">
        {{ $warna->links() }}
    </div>
</div>
@endsection