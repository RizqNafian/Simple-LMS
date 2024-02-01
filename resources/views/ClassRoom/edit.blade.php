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
    <form action="{{ route('classroom.update', $classroom->id) }}" method="post">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{ $classroom->class_name }}">
        <button type="submit">Submit</button>
    </form>
</body>
</html>