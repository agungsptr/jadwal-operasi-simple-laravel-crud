<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="{{ route('tindakan.update', ['tindakan'=>$tindakan->id]) }}" method="post">
        @csrf
        @method('PUT')

        <label for="">Tindakan :</label>
        <input name="tindakan" type="text" value="{{$tindakan->tindakan}}" required>

        @error('tindakan')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror

        <button type="submit">Simpan</button>
    </form>
</body>

</html>