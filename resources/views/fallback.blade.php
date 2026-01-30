@extends('layouts.fe_master')

@section('content')
    <div class="container text-center py-5 mt-5">
        <h1 class="display-1 fw-bold text-primary">404</h1>
        <h2 class="mb-4">Ups! Estás mais perdido que um solo de triângulo num concerto de Heavy Metal!</h2>
        <p class="lead mb-5">
            Parece que a página que procuras decidiu fazer um "stage dive" e desapareceu no meio da multidão.
            Não entres em pânico, ainda podes voltar para a primeira fila!
        </p>
        <a href="{{ route('homepage') }}" class="btn btn-primary btn-lg px-5">
            <i class="bi bi-house-door me-2"></i>Voltar ao Palco Principal
        </a>
    </div>
@endsection
