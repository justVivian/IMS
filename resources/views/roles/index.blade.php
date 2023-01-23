
@extends('layouts.app')
@section('title', 'Manajemen Pekerja')

@section('content-css')
.btn-delete {
    background-color: transparent;
    background-image: url('../storage/Delete.svg'); /* Add a search icon to input */
    background-position: center center; /* Position the search icon */
    background-repeat: no-repeat;
}
@endsection

@section('content-title')
<p class="page-title">Manajemen Pekerja</p>
<div class="container">
    <div class="row d-flex" style="justify-content: space-between;">
        @can('role-create')
        <a href="{{ route('roles.create') }}" class="btn btn-primary btn-custom">Tambah Pekerja</a>
        @endcan
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <!-- |
    <a href="/kategori/trash">Tong Sampah</a> -->
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
    @endif
    <br/>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Jabatan</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($roles as $key => $role)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $role->name }}</td>
                <td class="text-center">
                    <a class="btn" href="{{ route('roles.show',$role->id) }}"><i class="fas fa-eye" style="color:#5C89BD;"></i></a>
                    @can('role-edit')
                        <a class="btn" href="{{ route('roles.edit',$role->id) }}"><img src="{{ asset('storage/pen-square.svg') }}" alt=""></a>
                    @endcan
                    @can('role-delete')
                        {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('', ['class' => 'btn btn-delete']) !!}
                        {!! Form::close() !!}
                    @endcan
                </td>
            </tr>
            
            @endforeach
        </tbody>
    </table>
    <div class="row justify-content-center">
    {!! $roles->render() !!}
    </div>
</div>
@endsection