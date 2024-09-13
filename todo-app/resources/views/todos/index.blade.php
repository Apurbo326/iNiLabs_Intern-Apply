<!-- resources/views/todos/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-do List</title>
</head>
<body>
    <h1>To-do List</h1>

    <!-- Display To-do Items -->
    <ul>
        @foreach($todos as $todo)
            <li>
                <strong>{{ $todo->title }}</strong>
                <p>{{ $todo->description }}</p>
                <form action="{{ route('todos.destroy', $todo->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>

    <!-- Add New To-do -->
    <h2>Add New To-do</h2>
    <form action="{{ route('todos.store') }}" method="POST">
        @csrf
        <input type="text" name="title" placeholder="To-do title">
        <textarea name="description" placeholder="To-do description"></textarea>
        <button type="submit">Add</button>
    </form>
</body>
</html>
