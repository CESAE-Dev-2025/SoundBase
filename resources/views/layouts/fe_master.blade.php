<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homepage</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"
            defer>
    </script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="{{ route('homepage') }}">SoundBase</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('bands.all') }}">Bandas</a>
                </li>

                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('users.all') }}">Utilizadores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dash.home') }}">BackOffice</a>
                </li>
                @endauth
            </ul>

            @if (Route::has('login'))
            <ul class="navbar-nav ms-lg-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    @auth
                    <form method="post" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="nav-link">Logout</button>
                    </form>
                    @else
                    <a class="nav-link" href="{{ route('login') }}">Log in</a>
                    @endauth
                </li>
            </ul>
            @endif
        </div>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>

<footer class="fixed-bottom">
    <div class="container">
        <div class="d-flex flex-wrap justify-content-between align-items-start py-3 my-4 border-top">
            <div class="flex-column flex-md-row">
                <p class="mb-0 px-2 py-2 text-body-secondary">© 2026 Soundbase</p>
            </div>

            <ul class="nav justify-content-end flex-column flex-md-row">
                <li class="nav-item">
                    <a href="/" class="nav-link text-body-secondary">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('bands.all') }}" class="nav-link text-body-secondary">Bandas</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a href="{{ route('users.all') }}" class="nav-link text-body-secondary">Utilizadores</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('dash.home') }}" class="nav-link text-body-secondary">Backoffice</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</footer>

</body>

</html>
