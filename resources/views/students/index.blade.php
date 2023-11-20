<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Week12</title>
</head>

<body>
    <h1>Daftar Mahasiswa</h1>
    <a href="/students/create">Create new Student</a>
    <table border="1">
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Prodi</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Tindakan</th>
            <th>Create Date</th>
            <th>Update Date</th>
        </tr>
        @foreach ($students as $student)
            <tr>
                <td>{{ $student->nim }}</td>
                <td>{{ $student->nama }}</td>
                <td>{{ $student->prodi }}</td>
                <td>{{ $student->tanggal_lahir }}</td>
                <td>{{ $student->alamat }}</td>
                <td>{{ $student->telepon }}</td>
                <td>
                    <a href="/students/{{ $student->id }}">SHOW</a> |
                    <a href="/students/{{ $student->id }}/edit">EDIT</a> |
                    <form action="/students/{{ $student->id }}" method="post">
                        @method('DELETE')
                        {{-- Method DELETE dipake buat nge delete data yg dipilih --}}
                        @csrf
                        <button type="submit">DELETE</button>
                    </form>
                </td>
                <td>{{ $student->created_at }}</td>
                <td>{{ $student->updated_at }}</td>
            </tr>
        @endforeach
    </table>
</body>

</html>
