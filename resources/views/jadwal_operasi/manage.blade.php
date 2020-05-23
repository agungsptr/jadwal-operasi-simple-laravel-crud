@extends('layouts.app')
@section('title', 'Manage')
@section('content')

<div class="container">

    {{-- alert --}}
    @if (session('status'))
    <div class="alert alert-primary" role="alert">
        {{session('status')}}        
    </div>
    @endif

    <h1 class="display-4">Manage Jadwal Operasi</h1>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success float-right mb-3" data-toggle="modal" data-target="#staticBackdrop">
        Tambah
    </button>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th>Nama Pasien</th>
                <th>Nama Dokter</th>
                <th>Tindakan</th>
                <th>Jam Masuk</th>
                <th>Jam Selesai</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $op)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$op->pasien}}</td>
                <td>{{$op->dokter}}</td>
                <td>{{$op->tindakan}}</td>
                <td>{{substr($op->jam_masuk, 11, 5)}}</td>
                <td>{{substr($op->jam_keluar, 11, 5)}}</td>
                <td>{{$op->status}}</td>
                <td>
                    <a href="{{ route('op.manage.edit', ['id'=>$op->id]) }}" class="float-left btn btn-sm btn-info">Edit</a>
                    <form onsubmit="return confirm('Delete {{$op->pasien}} ?')" class=" float-left ml-1" action="{{ route('op.manage.delete', ['id'=>$op->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{$data->links()}}

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Jadwal Operasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('op.manage.store') }}" method="POST">
                        @csrf
                        <div>
                            <label for="">Nama Pasien</label>
                            <input class="form-control" name="pasien" type="text" required>
                        </div>
                        <div>
                            <label for="">Nama Dokter</label>
                            <select class="form-control" name="dokter" id="" required>
                                <option value="">Pilih</option>
                                @foreach ($listDokter as $ld)
                                <option value="{{$ld->nama}}">{{$ld->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="">Tindakan</label>
                            <select class="form-control" name="tindakan" id="" required>
                                <option value="">Pilih</option>
                                @foreach ($listTindakan as $lt)
                                <option value="{{$lt->tindakan}}">{{$lt->tindakan}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="">status</label>
                            <select class="form-control" name="status" id="" required>
                                <option value="">Pilih</option>
                                @foreach ($listStatus as $ls)
                                <option value="{{$ls->status}}">{{$ls->status}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="">Jam Masuk</label>
                            <input class="form-control" name="jam_masuk" type="datetime-local" required>
                        </div>
                        <div>
                            <label for="">Jam Selesai</label>
                            <input class="form-control" name="jam_keluar" type="datetime-local" required>
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