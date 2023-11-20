<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Week12</title>
</head>

<body>
    <h1>Create New Students</h1>

    @if ($errors)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="/students" method="POST" enctype="multipart/form-data">
        {{-- @csrf dipake buat mengamankan aplikasi dari serangan XSRF atau cross site request forgery --}}
        @csrf
        NIM: <input type="text" name="nim"><br>
        Nama: <input type="text" name="nama"><br>
        Prodi: <input type="text" name="prodi"><br>
        Tanggal Lahir: <input type="date" name="tanggal_lahir"><br>
        Alamat:
        <textarea type="text" name="alamat"></textarea><br>
        Telepon: <input type="text" name="telepon"><br>
        Foto: <input type="file" name="photo"><br>
        <button type="submit">Submit</button>
    </form>
</body>

</html>
