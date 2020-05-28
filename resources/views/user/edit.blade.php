@extends('layouts.app')
@section('title', 'User')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <h1 class="display-4">Edit User</h1>
            <div class="card p-3">
                <form action="{{ route('user.update', ['user'=>$user->id]) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="mb-2">
                        <label for="">Username</label>
                        <input type="text" name="username" value="{{$user->username}}"
                            class="form-control @error('username') is-invalid @enderror" required>
                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="">Password</label>
                        <input id="password" type="password" name="password"
                            class="form-control" minlength="6" required>
                    </div>

                    <div class="mb-2">
                        <label for="">Password Confirmation</label>
                        <input id="password_confirmation" type="password"
                            class="form-control"
                            name="password_confirmation">
                    </div>

                    <div class="mb-2">
                        <label for="">Role</label>
                        <select name="role" id="" class="form-control" required>
                            <option value="">Pilih</option>
                            <option {{$user->role == "user" ? 'SELECTED' : ''}} value="user">User</option>
                            <option {{$user->role == "admin" ? 'SELECTED' : ''}} value="admin">Admin</option>
                        </select>
                    </div>

                    <hr>
                    <button class="btn btn-primary float-right" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection