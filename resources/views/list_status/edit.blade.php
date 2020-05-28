@extends('layouts.app')
@section('title', 'Status')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <h1 class="display-4">Edit Dokter</h1>
            <div class="card p-3">
                <form action="{{ route('status.update', ['status'=>$status->id]) }}" method="post">
                    @csrf
                    @method('PUT')

                    <label for="">Status </label>
                    <input name="status" type="text" class="form-control @error('status') is-invalid @enderror"
                        value="{{$status->status}}" required>

                    @error('status')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                    <hr>
                    <button type="submit" class="btn btn-primary float-right">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection