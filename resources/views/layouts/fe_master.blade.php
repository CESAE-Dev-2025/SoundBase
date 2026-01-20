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
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous" defer>
    </script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link disabled" href="{{ route('homepage') }}">Home</a>
                    </li>
                    {{-- @auth --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('bands.all') }}">Bandas</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('albums.all') }}">Albums</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dash.home') }}">Dashboard</a>
                    </li> --}}
                    {{-- @endauth --}}
                </ul>
            </div>
            @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                    @auth
                        <form method="post" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-primary">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-link">
                            Log in
                        </a>

                        {{-- @if (Route::has('register'))
                            <a href="{{ route('users.add') }}" class="btn btn-outline-primary">
                                Register
                            </a>
                        @endif --}}
                    @endauth
                </nav>
            @endif
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <footer class="fixed-bottom">
        <div class="container">
            Footer das páginas
        </div>
    </footer>
</body>

</html>
