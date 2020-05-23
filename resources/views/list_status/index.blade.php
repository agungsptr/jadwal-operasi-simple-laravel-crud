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
            <th>Status</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($datas as $data)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$data->status}}</td>
                <td>
                    <a href="{{ route('status.edit', ['status'=>$data->id]) }}">Edit</a>
                    <form onsubmit="return confirm('Delete {{$data->status}} ?')" class=" float-left ml-1"
                        action="{{ route('status.destroy', ['status'=>$data->id]) }}" method="POST">
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
<form action="{{ route('status.store') }}" method="post">
    @csrf
    <label for="">Status :</label>
    <input name="status" type="text" required>
    @error('status')
    <div class="invalid-feedback">
        {{$message}}
    </div>
    @enderror
    <button type="submit">Simpan</button>
</form>

</html>