<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    {{-- alert --}}
    @if (session('status'))
    {{session('status')}}
    @endif

    <table>
        <thead>
            <th>No</th>
            <th>Tindakan</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($datas as $data)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$data->tindakan}}</td>
                <td>
                    <a href="{{ route('tindakan.edit', ['tindakan'=>$data->id]) }}">Edit</a>
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
</body>


{{-- dalam modal --}}
<br><br>
<form action="{{ route('tindakan.store') }}" method="post">
    @csrf
    <label for="">Tindakan :</label>
    <input name="tindakan" type="text" required>
    @error('tindakan')
    <div class="invalid-feedback">
        {{$message}}
    </div>
    @enderror
    <button type="submit">Simpan</button>
</form>

</html>