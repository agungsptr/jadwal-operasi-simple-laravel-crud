@extends('layouts.app')
@section('title', 'Dokter')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <h1 class="display-4">Edit Dokter</h1>
            <div class="card p-3">
                <form action="{{ route('dokter.update', ['dokter'=>$dokter->id]) }}" method="post">
                    @csrf
                    @method('PUT')

                    <label for="">Nama Dokter</label>
                    <input name="nama" type="text" class="form-control" value="{{$dokter->nama}}" required>

                    @error('nama')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                    <hr>
                    <button class="btn btn-primary float-right" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection