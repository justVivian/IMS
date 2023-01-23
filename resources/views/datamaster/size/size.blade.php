
@extends('layouts.app')
@section('title', 'Data Master | Size')

@section('content-css')

@endsection

@section('content-title')
<p class="page-title">Data Master Size</p>
<div class="container">
    <div class="row d-flex" style="justify-content: space-between;">

        <form action="/size/search" method="GET">
            <div class="form-group">
                <input type="text" id="search-bar" name="search" placeholder="Search .." value="{{ old('search') }}">
                <input type="submit" id="search-submit" class="btn btn-success" value="SEARCH" style="display:none;">
            </div>
        </form>
        @can('size-create')
        <a href="/size/tambah" class="btn btn-primary btn-custom">Tambah Size</a>
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
                <th>Size</th>
                <th></th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach($size as $p)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $p->size_satuan }}</td>
                <td></td>
                <td class="text-center">
                    @can('size-edit')
                    <a href="/size/edit/{{ $p->id }}" class="btn"><img src="{{ asset('storage/pen-square.svg') }}" alt=""></a>
                    @endcan
                    @can('size-delete')
                    <a href="/size/hapus/{{ $p->id }}" class="btn delete-confirm"><img src="{{ asset('storage/Delete.svg') }}" alt=""></a>
                    @endcan
                </td>
            </tr>
            <?php $i++; ?>
            @endforeach
        </tbody>
    </table>
    <div class="row justify-content-center">
        {{ $size->links() }}
    </div>
</div>
@endsection