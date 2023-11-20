<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Week12</title>
</head>
<body>
    <h1>Edit Students</h1>
    @if ($errors)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="/students/{{$students->id}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        NIM: <input type="text" name="nim" value="{{ $students->nim }}"><br>
        Nama: <input type="text" name="nama" value="{{ $students->nama }}"><br>
        Prodi: <input type="text" name="prodi" value="{{ $students->prodi }}"><br>
        Tanggal Lahir: <input type="date" name="tanggal_lahir" value="{{ $students->tanggal_lahir }}"><br>
        Alamat:<textarea type="text" name="alamat">{{ $students->alamat }}</textarea><br>
        Telepon: <input type="text" name="telepon" value="{{ $students->telepon }}"><br>
        Foto: <input type="file" name="photo"><br>
        Created_at: <input type="datetime-local" name="created_at" value="{{ $students->created_at }}"><br>
        Updated_at: <input type="datetime-local" name="updated_at" value="{{ $students->updated_at }}"><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>