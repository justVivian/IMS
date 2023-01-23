
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
.btn-delete {
    background-color: transparent;
    background-image: url('../storage/Delete.svg'); /* Add a search icon to input */
    background-position: center center; /* Position the search icon */
    background-repeat: no-repeat;
}
@endsection

@section('content-title')
<p class="page-title">Manajemen Pengguna</p>
<div class="container">
    <div class="row d-flex" style="justify-content: space-between;">
        <a href="{{ route('users.create') }}" class="btn btn-primary btn-custom">Tambah Pengguna</a>
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
                <th>Nama</th>
                <th>Email</th>
                <th>Jabatan</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($data as $key => $user)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                  @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $v)
                      <label class="status-success">{{ $v }}</label>
                    @endforeach
                  @endif
                </td>
                <td class="text-center">
                  <a class="btn" href="{{ route('users.show',$user->id) }}"><i class="fas fa-eye" style="color:#5C89BD;"></i></a>
                  <a class="btn" href="{{ route('users.edit',$user->id) }}"><img src="{{ asset('storage/pen-square.svg') }}" alt=""></a>
                    {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('', ['class' => 'btn btn-delete']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
            
            @endforeach
        </tbody>
    </table>
    <div class="row justify-content-center">
    {!! $data->render() !!}
    </div>
</div>
@endsection