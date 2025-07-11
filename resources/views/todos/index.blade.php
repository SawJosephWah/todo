<!DOCTYPE html>
<html>

<head>
    <title>Todo List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="p-4">
    <div class="container">
        <h2 class="mb-3">Todo List</h2>

        <!-- Form -->
        <form method="POST" action="{{ isset($todo) ? route('todos.update', $todo->id) : route('todos.store') }}">
            @csrf
            <div class="input-group mb-3">
                <input type="text" name="task" class="form-control" placeholder="Enter task" value="{{ $todo->task ?? '' }}">
                <button class="btn btn-primary" type="submit">
                    {{ isset($todo) ? 'Update' : 'Add New' }}
                </button>
            </div>
        </form>


        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Table -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Task</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($todos as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->task }}</td>
                    <td>
                        <a href="{{ route('todos.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('todos.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure to delete this task?');">
                            @csrf
                            <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</body>

</html>