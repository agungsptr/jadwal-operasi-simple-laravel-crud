@extends('layouts.app')
@section('title', 'User')
@section('content')
<div class="container">
    {{-- alert --}}
    @if (session('status'))
    <div class="alert alert-primary" role="alert">
        {{session('status')}}
    </div>
    @endif

    @error('username')
    <div class="alert alert-danger" role="alert">
        {{ $message }}
    </div>
    @enderror

    <h1 class="display-4">Manage User</h1>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success float-right mb-3" data-toggle="modal" data-target="#staticBackdrop">
        Tambah
    </button>
    <table class="table table-striped table-bordered">
        <thead>
            <th>#</th>
            <th>Username</th>
            <th>Created</th>
            <th>Role</th>
            <th>Action</th>
        </thead>
        <tbody>
            <span hidden>{{$start = ($users->currentpage()-1)*$users->perpage()}}</span>
            @foreach ($users as $user)
            <tr>
                <td>{{$start + $loop->iteration}}</td>
                <td>{{$user->username}}</td>
                <td>{{$user->created_at}}</td>
                <td>{{$user->role}}</td>
                <td>
                    <a href="{{ route('user.edit', ['user'=>$user->id]) }}"
                        class="btn btn-warning btn-sm float-left">Edit</a>
                    <form onsubmit="return confirm('Delete {{$user->username}} ?')" class=" float-left ml-1"
                        action="{{ route('user.destroy', ['user'=>$user->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{$users->links()}}
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf
                        <div class="mb-2">
                            <label for="">Username</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>

                        <div class="mb-2">
                            <label for="">Password</label>
                            <input id="password" type="password" name="password" class="form-control" minlength="6"
                                required>
                        </div>

                        <div class="mb-2">
                            <label for="">Password Confirmation</label>
                            <input id="password_confirmation" type="password" class="form-control"
                                name="password_confirmation">
                        </div>

                        <div class="mb-2">
                            <label for="">Role</label>
                            <select name="role" id="" required class="form-control">
                                <option value="">Pilih</option>
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>

                        <hr>
                        <button type="submit" class="btn btn-primary float-right">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection