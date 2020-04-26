<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jadwal Dokter</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Nama Pasien</th>
                <th>Nama Dokter</th>
                <th>Tindakan</th>
                <th>Status</th>
                <th>Jam Masuk</th>
                <th>Jam Selesai</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $op)
            <tr>
                <td>{{$op->pasien}}</td>
                <td>{{$op->dokter}}</td>
                <td>{{$op->tindakan}}</td>
                <td>{{$op->status}}</td>
                <td>{{$op->created_at}}</td>
                <td>{{$op->jam_keluar}}</td>
                <td>
                    <a href="{{ route('op.manage.edit', ['id'=>$op->id]) }}">Edit</a>
                    <form onsubmit="return confirm('Delete {{$op->pasien}} ?')"
                        action="{{ route('op.manage.delete', ['id'=>$op->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <br><br><br>

    {{-- form ini taruh di modal --}}
    <form action="{{ route('op.manage.store') }}" method="POST">
        @csrf
        <div>
            <label for="">Nama Pasien</label>
            <input name="pasien" type="text" required>
        </div>
        <div>
            <label for="">Nama Dokter</label>
            <input name="dokter" type="text" required>
        </div>
        <div>
            <label for="">Tindakan</label>
            <input name="tindakan" type="text" required>
        </div>
        <div>
            <label for="">status</label>
            <select name="status" id="" required>
                <option value="menuggu">Menuggu</option>
                <option value="proses">Proses</option>
                <option value="selesai">Selesai</option>
                <option value="r_pemulihan">Diruang Pemulihan</option>
                <option value="r_inap">Diruang Inap</option>
            </select>
        </div>
        <div>
            <label for="">Jam Selesai</label>
            <input name="jam_keluar" type="datetime-local" required>
        </div>
        <button type="submit">Tambah</button>
    </form>


</body>

</html>