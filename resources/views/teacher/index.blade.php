<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        <h1>Teacher</h1>

        <a href="{{route('teacher.create')}}">Tambah Guru</a>

        <table border="1">
            <tr>
                <td>No</td>
                <td>Nama Guru</td>
                <td>Opsi</td>
            </tr>
            <tr>
                @foreach ($teachers as $teacher)
                    <td>{{$loop->iteration}}</td>
                    <td>{{ $teacher->teacher_name }}</td>
                    <td>
                        <a href="{{route('teacher.edit', $teacher->id)}}">Edit</a>
                        <a href="{{route('teacher.del', $teacher->id)}}">Delete</a>
                    </td>
                @endforeach
            </tr>
        </table>
</body>
</html>
