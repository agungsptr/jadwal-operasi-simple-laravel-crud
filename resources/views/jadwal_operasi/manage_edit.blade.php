<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jadwal Dokter</title>
</head>

<body>
    <form action="{{ route('op.manage.update', ['id'=>$data->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="">Nama Pasien</label>
            <input name="pasien" type="text" value="{{$data->pasien}}" required>
        </div>
        <div>
            <label for="">Nama Dokter</label>
            <input name="dokter" type="text" value="{{$data->dokter}}" required>
        </div>
        <div>
            <label for="">Tindakan</label>
            <input name="tindakan" type="text" value="{{$data->tindakan}}" required>
        </div>
        <div>
            <label for="">status</label>
            <select name="status" id="" required>
                <option value="menuggu" {{$data->tindakan == 'menuggu' ? 'SELECTED':''}}>Menuggu</option>
                <option value="proses" {{$data->tindakan == 'proses' ? 'SELECTED':''}}>Proses</option>
                <option value="selesai" {{$data->tindakan == 'selesai' ? 'SELECTED':''}}>Selesai</option>
                <option value="r_pemulihan" {{$data->tindakan == 'r_pemulihan' ? 'SELECTED':''}}>Diruang Pemulihan
                </option>
                <option value="r_inap" {{$data->tindakan == 'r_inap' ? 'SELECTED':''}}>Diruang Inap</option>
            </select>
        </div>
        <div>
            <label for="">Jam Selesai</label>
            <input name="jam_keluar" type="datetime-local" value="{{str_replace(" ","T",$data->jam_keluar)}}" required>
        </div>
        <button type="submit">Simpan</button>
    </form>
</body>

</html>