<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <table>
        <thead>
            <th>No</th>
            <th>Status</th>
        </thead>
        <tbody>
            @foreach ($datas as $data)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$data->status}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{$datas->links()}}
</body>


{{-- dalam modal --}}
<br><br>
<form action="{{ route('status.store') }}" method="post">
    @csrf
    <label for="">Status :</label>
    <input name="status" type="nama" required>
    @error('status')
    <div class="invalid-feedback">
        {{$message}}
    </div>
    @enderror
    <button type="submit">Simpan</button>
</form>

</html>