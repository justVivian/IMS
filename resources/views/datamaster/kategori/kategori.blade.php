
@extends('layouts.app')
@section('title', 'Data Master | Kategori')

@section('content-css')

@endsection

@section('content-title')
<p class="page-title">Data Master Kategori</p>
<div class="container">
    <div class="row d-flex" style="justify-content: space-between;">

        <form action="/kategori/search" method="GET">
            <div class="form-group">
                <input type="text" id="search-bar" name="search" placeholder="Search .." value="{{ old('search') }}">
                <input type="submit" id="search-submit" class="btn btn-success" value="SEARCH" style="display:none;">
            </div>
        </form>
        @can('kategori-create')
        <a href="/kategori/tambah" class="btn btn-primary btn-custom">Tambah Kategori</a>
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
                <th>Kategori</th>
                <th></th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach($kategori as $p)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $p->kategori_name }}</td>
                <td></td>
                <td class="text-center">
                    @can('kategori-edit')
                    <a href="/kategori/edit/{{ $p->id }}" class="btn"><img src="{{ asset('storage/pen-square.svg') }}" alt=""></a>
                    @endcan
                    @can('kategori-delete')
                    <a href="/kategori/hapus/{{ $p->id }}" class="btn delete-confirm"><img src="{{ asset('storage/Delete.svg') }}" alt=""></a>
                    @endcan
                </td>
            </tr>
            <?php $i++; ?>
            @endforeach
        </tbody>
    </table>
    <div class="row justify-content-center">
        {{ $kategori->links() }}
    </div>
</div>
@endsection