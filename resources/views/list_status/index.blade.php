@extends('layouts.app')
@section('title', 'List Status')
@section('content')

<div class="container">

    {{-- alert --}}
    @if (session('status'))
    <div class="alert alert-primary" role="alert">
        {{session('status')}}
    </div>
    @endif

    <h1 class="display-4">Manage Status</h1>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success float-right mb-3" data-toggle="modal" data-target="#staticBackdrop">
        Tambah
    </button>

    <table class="table table-striped table-bordered">
        <thead>
            <th>No</th>
            <th>Status</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($datas as $data)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$data->status}}</td>
                <td>
                    <a href="{{ route('status.edit', ['status'=>$data->id]) }}" class="btn btn-warning btn-sm float-left">Edit</a>
                    <form onsubmit="return confirm('Delete {{$data->status}} ?')" class=" float-left ml-1" action="{{ route('status.destroy', ['status'=>$data->id]) }}" method="POST">
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
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('status.store') }}" method="POST">
                        @csrf
                        <div>
                            <label for="">Nama Status</label>
                            <input name="status" type="text" class="form-control" required>

                            @error('status')
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