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
                        <div>
                            <label for="">Nama Dokter</label>
                            <input class="form-control" name="dokter" type="text" value="{{$data->dokter}}" required>
                        </div>
                        <div>
                            <label for="">Tindakan</label>
                            <input class="form-control" name="tindakan" type="text" value="{{$data->tindakan}}"
                                required>
                        </div>
                        <div>
                            <label for="">status</label>
                            <select class="form-control" name="status" id="" required>
                                <option value="menuggu" {{$data->tindakan == 'menuggu' ? 'SELECTED':''}}>Menuggu
                                </option>
                                <option value="proses" {{$data->tindakan == 'proses' ? 'SELECTED':''}}>Proses</option>
                                <option value="selesai" {{$data->tindakan == 'selesai' ? 'SELECTED':''}}>Selesai
                                </option>
                                <option value="pemulihan" {{$data->tindakan == 'r_pemulihan' ? 'SELECTED':''}}>Diruang
                                    Pemulihan
                                </option>
                                <option value="inap" {{$data->tindakan == 'r_inap' ? 'SELECTED':''}}>Diruang Inap
                                </option>
                            </select>
                        </div>
                        <div>
                            <label for="">Jam Selesai</label>
                            <input class="form-control" name="jam_keluar" type="datetime-local"
                                value="{{str_replace(" ","T",$data->jam_keluar)}}" required>
                        </div>
                        <a class="btn btn-primary mt-3" href="{{route("op.manage")}}">Kembali</a>
                        <button type="submit" class="btn btn-warning mt-3 float-right">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>