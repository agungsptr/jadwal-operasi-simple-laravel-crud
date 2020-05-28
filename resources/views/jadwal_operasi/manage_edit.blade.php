@extends('layouts.app')
@section('title', 'Manage')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <h1 class="display-4">Edit Jadwal Operasi</h1>
                <div class="card p-3">
                    <form action="{{ route('op.manage.update', ['id'=>$data->id]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="">Nama Pasien</label>
                            <input class="form-control" name="pasien" type="text" value="{{$data->pasien}}" required>
                        </div>
                        <div class="mb-2">
                            <label for="">Nama Dokter</label>
                            <select class="form-control" name="dokter" id="" required>
                                <option value="">Pilih</option>
                                @foreach ($listDokter as $ld)
                                <option {{$data->dokter == $ld->nama ? 'SELECTED' : ''}} value="{{$ld->nama}}">{{$ld->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="">Tindakan</label>
                            <select class="form-control" name="tindakan" id="" required>
                                <option value="">Pilih</option>
                                @foreach ($listTindakan as $lt)
                                <option {{$data->tindakan == $lt->tindakan ? 'SELECTED' : ''}} value="{{$lt->tindakan}}">{{$lt->tindakan}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="">Status</label>
                            <select class="form-control" name="status" id="" required>
                                <option value="">Pilih</option>
                                @foreach ($listStatus as $ls)
                                <option {{$data->status == $ls->status ? 'SELECTED' : ''}} value="{{$ls->status}}">{{$ls->status}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="">Jam Masuk</label>
                            <input class="form-control" name="jam_masuk" type="datetime-local"
                                value="{{str_replace(" ","T",$data->jam_masuk)}}" required>
                        </div>
                        <hr>
                        <a class="btn btn-primary" href="{{route("op.manage")}}">Kembali</a>
                        <button type="submit" class="btn btn-warning float-right">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection