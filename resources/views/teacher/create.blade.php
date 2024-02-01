<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

        <h2>Add Teacher</h2>
        {{-- Buat form --}}
        <form action="{{ route('teacher.store') }}" method="POST">
            @csrf
            <label for="teacher_name">Name Teacher</label>
            <input type="text" name="name">
            <button type="submit">Submit</button>
        </form>
        <a href="{{route('teacher.index')}}">Back</a>
</body>
</html>
