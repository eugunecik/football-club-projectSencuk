<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Футбольний Клуб</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <a class="navbar-brand" href="/">Футбольний Клуб</a>
        <div class="navbar-nav">
            <a class="nav-item nav-link" href="{{ route('teams.index') }}">Команди</a>
            <a class="nav-item nav-link" href="{{ route('players.index') }}">Гравці</a>
            <a class="nav-item nav-link" href="{{ route('coaches.index') }}">Тренери</a>
            <a class="nav-item nav-link" href="{{ route('matches.index') }}">Матчі</a>
            <a class="nav-item nav-link" href="{{ route('stadiums.index') }}">Стадіони</a>
            <a class="nav-item nav-link" href="{{ route('sponsors.index') }}">Спонсори</a>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>