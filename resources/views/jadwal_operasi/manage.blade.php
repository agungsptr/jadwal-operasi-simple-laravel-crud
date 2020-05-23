<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Jadwal Dokter</title>
</head>

<body>
    <div class="container">

        {{-- alert --}}
        @if (session('status'))
        {{session('status')}}
        @endif

        <h1 class="display-4">Manage Jadwal Operasi</h1>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success float-right mb-3" data-toggle="modal"
            data-target="#staticBackdrop">
            Tambah
        </button>

        @auth
        <a class="btn btn-primary float-right mr-2 mb-3" href="{{route('dokter.index')}}">List Dokter</a>
        <a class="btn btn-primary float-right mr-2 mb-3" href="{{route('tindakan.index')}}">List Tindakan</a>
        <a class="btn btn-primary float-right mr-2 mb-3" href="{{route('status.index')}}">List Status</a>
        @endauth

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th style="width: 15%">Nama Pasien</th>
                    <th style="width: 15%">Nama Dokter</th>
                    <th style="width: 25%">Tindakan</th>
                    <th style="width: 10%">Jam Masuk</th>
                    <th style="width: 10%">Jam Selesai</th>
                    <th style="width: 10%">Status</th>
                    <th style="width: 130px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $op)
                <tr>
                    <td>{{$op->pasien}}</td>
                    <td>{{$op->dokter}}</td>
                    <td>{{$op->tindakan}}</td>
                    <td>{{substr($op->jam_masuk, 11, 19)}}</td>
                    <td>{{substr($op->jam_keluar, 11, 19)}}</td>
                    <td>{{$op->status}}</td>
                    <td>
                        <a href="{{ route('op.manage.edit', ['id'=>$op->id]) }}"
                            class="float-left btn btn-sm btn-info">Edit</a>
                        <form onsubmit="return confirm('Delete {{$op->pasien}} ?')" class=" float-left ml-1"
                            action="{{ route('op.manage.delete', ['id'=>$op->id]) }}" method="POST">
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
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
            role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                    </div>
                    <div class="modal-footer">
                        <button id="btn_simpan" type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>