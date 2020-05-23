@extends('layouts.app')
@section('title', 'Tindakan')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <h1 class="display-4">Edit Tindakan</h1>
            <div class="card p-3">
                <form action="{{ route('tindakan.update', ['tindakan'=>$tindakan->id]) }}" method="post">
                    @csrf
                    @method('PUT')

                    <label for="">Tindakan :</label>
                    <input name="tindakan" class="form-control" type="text" value="{{$tindakan->tindakan}}" required>

                    @error('tindakan')
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