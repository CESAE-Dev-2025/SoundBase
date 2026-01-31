@extends('layouts.fe_master')

@section('title', 'Homepage')

@section('content')
    <div class="py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <img
                    src="https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?ixlib=rb-4.0.3&auto=format&fit=crop&w=700&q=80"
                    class="d-block mx-lg-auto img-fluid rounded shadow" alt="Music" width="700" height="500"
                    loading="lazy">
            </div>
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Bem-vindo ao SoundBase</h1>
                <p class="lead">A tua plataforma definitiva para gestão de bandas e álbuns. Organiza a tua coleção
                    musical, explora novos artistas e mantém o controlo total sobre a tua base de dados sonora.</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    @auth
                        <a href="{{ route('bands.all') }}" class="btn btn-primary btn-lg px-4 me-md-2">Ver Bandas</a>
                        <a href="{{ route('dash.home') }}" class="btn btn-outline-secondary btn-lg px-4">BackOffice</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary btn-lg px-4 me-md-2">Começar Agora</a>
                        <a href="{{ route('bands.all') }}" class="btn btn-outline-secondary btn-lg px-4">Explorar</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <div class="container px-4 py-5" id="featured-3">
        <h2 class="pb-2 border-bottom">Funcionalidades Principais</h2>
        <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
            <div class="feature col">
                <div
                    class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3 px-3 py-2 rounded">
                    <i class="bi bi-music-note-list"></i>
                </div>
                <h3 class="fs-2 text-body-emphasis">Gestão de Bandas</h3>
                <p>Adiciona, edita e remove bandas da tua coleção. Mantém um registo detalhado com fotos e informações
                    de cada grupo musical.</p>
            </div>
            <div class="feature col">
                <div
                    class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3 px-3 py-2 rounded">
                    <i class="bi bi-disc"></i>
                </div>
                <h3 class="fs-2 text-body-emphasis">Controlo de Álbuns</h3>
                <p>Organiza a discografia de cada banda. Associa álbuns a bandas, gere capas e mantém a tua biblioteca
                    sempre atualizada.</p>
            </div>
            <div class="feature col">
                <div
                    class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3 px-3 py-2 rounded">
                    <i class="bi bi-people"></i>
                </div>
                <h3 class="fs-2 text-body-emphasis">Gestão de Utilizadores</h3>
                <p>Área reservada para utilizadores autenticados com permissões de administração para manter a
                    integridade dos dados da plataforma.</p>
            </div>
        </div>
    </div>

    <div class="container px-4 py-5">
        <div class="p-5 text-center bg-body-tertiary rounded-3">
            <h1 class="text-body-emphasis">Pronto para organizar as tuas músicas?</h1>
            <p class="col-lg-8 mx-auto fs-5 text-muted">
                Junta-te ao Soundbase hoje e começa a catalogar as tuas bandas favoritas de forma simples e intuitiva.
            </p>
            <div class="d-inline-flex gap-2 mb-5">
                @guest
                    <a href="{{ route('login') }}"
                       class="d-inline-flex align-items-center btn btn-primary btn-lg px-4 rounded-pill">
                        Fazer Login
                    </a>
                @endguest
                <a href="{{ route('bands.all') }}"
                   class="btn btn-outline-secondary btn-lg px-4 rounded-pill">
                    Ver Bandas
                </a>
            </div>
        </div>
    </div>
@endsection
