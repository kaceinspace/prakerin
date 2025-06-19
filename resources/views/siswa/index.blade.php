<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Daftar Siswa</h1>
    <hr>
    <table>
        <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>Kelas</th>
            <th>Aksi</th>
        </tr>
        @php $no=1; @endphp
        @foreach ($siswa as $data)
        <tr>
            <td>{{$no++}}</td>
            <td>{{$data['nama']}}</td>
            <td>{{$data['kelas']}}</td>
            <td>
                <form action="/siswa/{{ $data['id'] }}" method="post">
                    <a href="/siswa/{{ $data['id'] }}">Show</a> |
                    <a href="/siswa/{{ $data['id'] }}/edit">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('apakah anda yakin?')">
                        Delete
                    </button>
                </form>

            </td>
        </tr>
        @endforeach
    </table>

</body>

</html>