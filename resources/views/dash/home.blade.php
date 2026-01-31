@extends('layouts.fe_master')

@section('title', 'Dashboard')

@use('App\Enums\UserType')

@php
    $isAdmin = Auth::user() != null && Auth::user()->user_type == UserType::ADMIN;
@endphp

@section('content')
    <h3 class="my-3">Olá, {{ Auth::user()->name }}</h3>

    @if ($isAdmin)
        <div class="alert alert-danger" role="alert">
            Cuidado! Você fez login como 'Admin' e tem permissões perigosas!
        </div>
    @endif

    <div class="row mt-4">

        @if ($isAdmin)
            <div class="col-md-4">
                <a href="{{ route('users.all') }}" class="text-decoration-none">
                    <div class="card text-center shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title text-muted"><i class="bi bi-people me-2"></i>Utilizadores</h5>
                            <p class="display-6 fw-bold mb-0 text-dark">{{ $totalUsers }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endif

        <div class="col-md-4">
            <a href="{{ route('bands.all') }}" class="text-decoration-none">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-muted"><i class="bi bi-music-note-beamed me-2"></i>Bandas</h5>
                        <p class="display-6 fw-bold mb-0 text-dark">{{ $totalBands }}</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="{{ route('albums.all') }}" class="text-decoration-none">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-muted"><i class="bi bi-disc me-2"></i>Álbuns</h5>
                        <p class="display-6 fw-bold mb-0">{{ $totalAlbums }}</p>
                    </div>
                </div>
            </a>
        </div>

    </div>
@endsection
