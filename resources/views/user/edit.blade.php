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

                    <label for="">Username</label>
                    <input type="text" name="username" value="{{$user->username}}" required>

                    @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <br>

                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control" required>

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <br>

                    <label for="">Password Confirmation</label>
                    <input type="password" class="form-control" name="password_confirmation">

                    <hr>
                    <button class="btn btn-primary float-right" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection