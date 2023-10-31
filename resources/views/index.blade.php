<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
</head>

<body>
    <h1>Task List</h1>
    <form method = "GET" action = "/tasks/search">
        <input type = "text" name = "query" placeholder = "Search tasks">
        <button type = "submit">Search</button>
    </form>
    <ul>
        <br>
        <hr>
        <hr>
        @foreach ($tasks as $task)
            <li>{{ $task->title }}</li>
            <p>{{ $task->description }}</p>
            <a href = "task/{{ $task->id }}/edit">Edit</a>
            <form method = "POST" action = "/tasks/{{ $task->id }}"
                onsubmit = "return confirm('Are you sure you want to delete this task?');">
                @csrf
                @method('DELETE')
                <button type = "submit">Delete</button>
            </form>
            <hr>
            <hr>
        @endforeach
    </ul>
    <div class="pagination">
        {{ $tasks->links() }}
    </div>
</body>

</html>
