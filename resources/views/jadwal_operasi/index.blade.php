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
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>