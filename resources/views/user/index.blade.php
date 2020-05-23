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
            <th>Username</th>
            <th>Created at</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$user->username}}</td>
                <td>{{$user->created_at}}</td>
                <td>
                    <a href="{{ route('user.edit', ['user'=>$user->id]) }}">Edit</a>
                    <form onsubmit="return confirm('Delete {{$user->username}} ?')" class=" float-left ml-1"
                        action="{{ route('user.destroy', ['user'=>$user->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{$users->links()}}

    <br><br><br>
    {{-- modal tambah --}}
    <form action="{{ route('user.store') }}" method="post">
        @csrf
        <label for="">Username</label>
        <input type="text" name="username" class="  @error('username') is-invalid @enderror">

        @error('username')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <br>
        <br>

        <label for="">Password</label>
        <input type="password" name="password" class="  @error('password') is-invalid @enderror">

        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <br>

        <label for="">Password Confirmation</label>
        <input type="password" name="password_confirmation">
        <br>

        <button type="submit">Simpan</button>
    </form>


</body>

</html>