@extends('layouts.fe_master')

@use('App\Enums\UserType')

@php
    $isAdmin = Auth::user()->user_type == UserType::ADMIN;
@endphp

@section('content')
    {{-- TODO: Receber informações da banda --}}
    <h3 class="my-3">Álbums | {{ $band->name }}</h3>


    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    @if (count($albums) == 0)
        <a class="btn btn-primary mb-3" href="{{ route('albums.add') }}">Adicionar álbum</a>
        <p>Ainda não há bandas... :-(</p>
    @else
        <div class="d-flex gap-2">
            <form class="d-flex mb-3 col" role="search" action="">
                <input class="form-control me-2" type="search" name="search" placeholder="Pesquisar álbum"
                    aria-label="Search task" />
                <button class="btn btn-outline-secondary" type="submit">Pesquisar</button>
            </form>
            @if ($isAdmin)
                <a class="btn btn-primary mb-3 col-3 col-lg-2" href="{{ route('albums.add') }}">Adicionar álbum</a>
            @endif
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col" class="text-center col-1">#</th>
                    <th scope="col" class="text-center col-1">Capa</th>
                    <th scope="col">Título</th>
                    <th scope="col" class="text-center col-2">Data de lançamento</th>
                    <th scope="col" class="text-center col-3 {{ $isAdmin ? '' : 'col-lg-2' }}">Ações</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($albums as $album)
                    <tr>
                        <th class="align-middle text-center col-1" scope="row">{{ $album->id }}</th>
                        <td class="align-middle cover-image text-center col-1">
                            {{-- TODO: Adicionar imagem do álbum --}}
                            <img src="{{ $album->photo ? asset('storage/' . $album->photo) : asset('images/no_album_cover.jpg') }}"
                                alt="Imagem do álbum" class="" id="cover-picture">
                        </td>
                        <td class="align-middle">{{ $album->title }}</td>
                        <td class="align-middle text-center col-2">{{ $album->release_date }}</td>
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
