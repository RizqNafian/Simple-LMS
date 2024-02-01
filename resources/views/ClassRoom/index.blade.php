<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>ClassRoom</h1>
    {{-- tambah data --}}
    <a href="{{ route('classroom.create') }}">Create</a>
    
        {{-- buat tabel --}}
        <table border="1">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
            @foreach ($classrooms as $classroom)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $classroom->class_name }}</td>
                <td>
                    <a href="{{ route('classroom.edit', $classroom->id) }}">Edit</a>
                    <a href="{{ route('classroom.show', $classroom->id) }}">Show</a>
                    <a href="{{ route('classroom.del', $classroom->id) }}">Delete</a>
                </td>
            </tr>
            @endforeach
        </table>
</body>
</html>