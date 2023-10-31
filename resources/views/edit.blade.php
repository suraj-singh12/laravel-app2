<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="/tasks/{{ $task->id }}">
        @csrf
        @method('PUT')  {{-- use the PUT method for updates --}}
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="{{ $task->title }}" required />
        {{-- will prefill the value of the last posted data --}}

        <label for="description"> Description: </label>
        <textarea name="description" id="description" required />
            {{ $task->description }}
        </textarea>

        <button type="submit">Update Task</button>
    </form>
</body>
</html>
