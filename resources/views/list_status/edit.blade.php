<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="{{ route('status.update', ['status'=>$status->id]) }}" method="post">
        @csrf
        @method('PUT')

        <label for="">Status :</label>
        <input name="status" type="text" value="{{$status->status}}" required>

        @error('status')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror

        <button type="submit">Simpan</button>
    </form>
</body>

</html>