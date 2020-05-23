@extends('layouts.app')
@section('title', 'List Dokter')
@section('content')
<div class="container">
    {{-- alert --}}
    @if (session('status'))
    <div class="alert alert-primary" role="alert">
    {{session('status')}}
    </div>
    @endif
    <h1 class="display-4">Manage Dokter</h1>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success float-right mb-3" data-toggle="modal" data-target="#staticBackdrop">
        Tambah
    </button>
    <table class="table table-striped table-bordered">
        <thead>
            <th>No</th>
            <th>Nama Dokter</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($datas as $data)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$data->nama}}</td>
                <td>
                    <a href="{{ route('dokter.edit', ['dokter'=>$data->id]) }}" class="btn btn-warning btn-sm float-left">Edit</a>
                    <form onsubmit="return confirm('Delete {{$data->nama}} ?')" class=" float-left ml-1" action="{{ route('dokter.destroy', ['dokter'=>$data->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{$datas->links()}}
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Dokter</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('dokter.store') }}" method="POST">
                        @csrf
                        <div>
                            <label for="">Nama Dokter</label>
                            <input name="nama" type="text" class="form-control" required>

                            @error('nama')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
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