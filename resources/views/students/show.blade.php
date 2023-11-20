<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Week12</title>
</head>
<body>
    <h1>{{$students->nama}}</h1>
    <a href="/students">Back to Student List</a><br>
    NIM: {{$students->nim}} <br>
    Nama: {{$students->nama}} <br>
    Prodi: {{$students->prodi}} <br>
    Tanggal Lahir: {{$students->tanggal_lahir}}<br>
    Alamat: {{$students->alamat}}<br>
    Telepon: {{$students->telepon}}<br>
    Photo: <img src="{{asset($photos)}}">
</body>
</html>