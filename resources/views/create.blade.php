<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="/tasks">
        @csrf
        <label for="title">Title</label>
        <input type="text" name="title" id="title" required />

        <label for="description">Description: </label>
        <textarea name="description" id="description" cols="30" rows="10" required></textarea>

        <button type="submit"> Add Task </button>
    </form>
</body>
</html>
