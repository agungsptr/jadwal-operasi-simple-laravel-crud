<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="{{ route('user.update', ['user'=>$user->id]) }}" method="post">
        @csrf
        @method('PUT')

        <label for="">Username</label>
        <input type="text" name="username" value="{{$user->username}}"
            class="  @error('username') is-invalid @enderror">

        @error('username')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
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