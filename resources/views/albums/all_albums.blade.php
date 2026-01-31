@extends('layouts.fe_master')

@use('App\Enums\UserType')

@php
    $isAdmin = Auth::user() != null && Auth::user()->user_type == UserType::ADMIN;
    $bandId = $band->id ?? 0;
@endphp

@section('content')

    <h1 class="my-3">Álbums</h1>

    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    @if ($isAdmin)
        <a class="btn btn-primary mb-3" href="{{ route('albums.add', ['bandId' => $bandId]) }}">Adicionar álbum</a>
    @endif

    @if (count($albums) == 0)
        <p>Ainda não há bandas... :-(</p>
    @else
        <div class="d-flex gap-2">
            <form class="d-flex mb-3 col" role="search" action="">
                <input class="form-control me-2" type="search" name="search" placeholder="Pesquisar álbum"
                       aria-label="Search task"/>
                <button class="btn btn-outline-secondary" type="submit">Pesquisar</button>
            </form>
        </div>

        <table class="table">
            <thead>
            <tr>
                <th scope="col" class="text-center col-1">Capa</th>
                <th scope="col">Título</th>
                <th scope="col" class="text-center col-2">Data de lançamento</th>
                <th scope="col" class="text-center col-2">Banda</th>
                <th scope="col" class="text-center col-3 {{ $isAdmin ? '' : 'col-lg-2' }}">Ações</th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
            @foreach ($albums as $album)
                <tr>
                    <td class="align-middle cover-image text-center col-1">
                        <img
                            src="{{ $album->photo ? asset('storage/' . $album->photo) : asset('images/no_album_cover.jpg') }}"
                            alt="Imagem do álbum" class="" id="cover-picture">
                    </td>
                    <td class="align-middle">{{ $album->title }}</td>
                    <td class="align-middle text-center col-2">{{ date('d/m/Y', strtotime($album->release_date)) }}</td>
                    <td class="align-middle text-left" scope="row">
                        <img
                            src="{{ $album->photo ? asset('storage/' . $album->bandImage) : asset('images/no_album_cover.jpg') }}"
                            alt="Imagem da banda" class="rounded-circle me-2" id="cover-picture">
                        {{ $album->band }}</td>
                    <td class="align-middle text-center col-3 {{ $isAdmin ? '' : 'col-lg-2' }}">
                        @if ($isAdmin)
                            <a href="{{ route('albums.view', $album->id) }}" class="btn btn-info m-1">Ver / Editar</a>
                            <a href="{{ route('albums.delete', $album->id) }}" class="btn btn-danger m-1">Apagar</a>
                        @else
                            <a href="{{ route('albums.view', $album->id) }}" class="btn btn-info m-1">Ver detalhes</a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
