@extends('layouts.app')
@section('title', 'List Tindakan')
@section('content')
<div class="container">
    {{-- alert --}}
    @if (session('status'))
    <div class="alert alert-primary" role="alert">
        {{session('status')}}
    </div>
    @endif

    @error('tindakan')
    <div class="alert alert-danger" role="alert">
        {{$message}}
    </div>
    @enderror

    <h1 class="display-4">Manage Tindakan</h1>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success float-right mb-3" data-toggle="modal" data-target="#staticBackdrop">
        Tambah
    </button>
    <table class="table table-striped table-bordered">
        <thead>
            <th>#</th>
            <th>Tindakan</th>
            <th>Action</th>
        </thead>
        <tbody>
            <span hidden>{{$start = ($datas->currentpage()-1)*$datas->perpage()}}</span>
            @foreach ($datas as $data)
            <tr>
                <td>{{$start + $loop->iteration}}</td>
                <td>{{$data->tindakan}}</td>
                <td>
                    <a href="{{ route('tindakan.edit', ['tindakan'=>$data->id]) }}"
                        class="btn btn-sm btn-warning float-left">Edit</a>
                    <form onsubmit="return confirm('Delete {{$data->tindakan}} ?')" class=" float-left ml-1"
                        action="{{ route('tindakan.destroy', ['tindakan'=>$data->id]) }}" method="POST">
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
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Tindakan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('tindakan.store') }}" method="POST">
                        @csrf
                        <div>
                            <label for="">Nama Tindakan</label>
                            <input name="tindakan" type="text" class="form-control" required>
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