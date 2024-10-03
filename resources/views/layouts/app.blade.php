<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Football Club Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="/">Football Club</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="{{ route('teams.index') }}">Teams</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('players.index') }}">Players</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('coaches.index') }}">Coaches</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('matches.index') }}">Matches</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('stadiums.index') }}">Stadiums</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('sponsors.index') }}">Sponsors</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <footer class="mt-5 py-3 bg-light">
        <div class="container text-center">
            <span class="text-muted">© 2024 Football Club Management</span>
        </div>
    </footer>
</body>
</html>