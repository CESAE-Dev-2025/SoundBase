@extends('layouts.fe_master')

@section('content')
    @auth
        <h3 class="my-3">Olá, {{ Auth::user()->name }}</h3>
    @else
        <h3 class="my-3">Bem vindo</h3>
    @endauth

    <p>{{ $userData['name'] }} - {{ $userData['age'] }} anos</p>

    {{-- <div class="card col-4 mb-4">
        <div class="card-body">
            <h4 class="card-title">{{ $cesaeInfo['name'] }}</h4>
            <p class="card-text">Morada: <span>{{ $cesaeInfo['address'] }}</span></p>
            <p class="card-text">email: <span>{{ $cesaeInfo['email'] }}</span></p>
        </div>
    </div> --}}

    {{-- <img src="{{ asset('images/GAN_magnetico.jpg') }}" alt="Cubo mágico magnético GAN"> --}}
@endsection
