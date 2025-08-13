<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book APP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('book.index') }}">Book App</a>
            <div style="display: flex; gap: 40px;">
                <a class="nav-link d-inline text-light" style="text-decoration: underline;" href="{{ route('book.index') }}">Books</a>
                <a class="nav-link d-inline text-light" style="text-decoration: underline;" href="{{ route('author.index') }}">Top Authors</a>
                <a class="nav-link d-inline text-light" style="text-decoration: underline;" href="{{ route('rating.create') }}">Input Rating</a>
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>    
</body>
</html>