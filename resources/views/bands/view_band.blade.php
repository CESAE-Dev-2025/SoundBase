@extends('layouts.fe_master')

@use('App\Enums\UserType')

@php
    $isLoggedIn = Auth::user() != null;
    $isAdmin = $isLoggedIn && Auth::user()->user_type == UserType::ADMIN;
@endphp

@section('content')
    <h3 class="my-3">Detalhes da banda '{{ $band->name }}'</h3>


    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <div class="d-flex">

        <form method="post" action="{{ route('bands.update') }}" class="col-6 mb-5" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <input type="hidden" name="id" value="{{ $band->id }}">

            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input name="name" type="text" class="form-control" id="name" value="{{ $band->name }}"
                    aria-describedby="nameHelp" required {{ $isLoggedIn ? '' : 'readonly' }}>
            </div>
            @error('name')
                <p class="text-danger">Erro de nome</p>
            @enderror

            <div class="mb-3">
                <label for="photo" class="form-label">Imagem da banda</label>
                <input class="form-control" type="file" name="photo" id="photo" accept="image/*"
                    value="{{ $band->photo }}" {{ $isLoggedIn ? '' : 'disabled' }}>
            </div>

            @if ($isLoggedIn)
                <button type="submit" class="btn btn-primary">Atualizar</button>
            @endif
        </form>
        <img src="{{ $band->photo ? asset('storage/' . $band->photo) : asset('images/Profile_avatar_placeholder_large.png') }}"
            alt="Imagem da banda" class="ms-auto me-0 col-3">
    </div>
    <h3 class="my-3">Álbums da banda '{{ $band->name }}'</h3>

    @if ($isLoggedIn)
        <a class="btn btn-primary mb-3 col-3 col-lg-2" href="{{ route('albums.add', ['bandId' => $band->id]) }}">Adicionar
            álbum</a>
    @endif

    @if (count($albums) == 0)
        <p>Ainda não há álbums para '{{ $band->name }}'... :-(</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" class="text-center col-1">#</th>
                    <th scope="col" class="text-center col-1">Capa</th>
                    <th scope="col">Título</th>
                    <th scope="col" class="text-center col-2">Data de lançamento</th>
                    <th scope="col" class="text-center col-3">Ações</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($albums as $album)
                    <tr>
                        <th class="align-middle text-center col-1" scope="row">{{ $album->id }}</th>
                        <td class="align-middle cover-image text-center col-1">
                            <img src="{{ $album->photo ? asset('storage/' . $album->photo) : asset('images/no_album_cover.jpg') }}"
                                alt="Imagem do álbum" class="" id="cover-picture">
                        </td>
                        <td class="align-middle">{{ $album->title }}</td>
                        <td class="align-middle text-center col-2">{{ $album->release_date }}</td>
                        <td class="align-middle text-center col-3">
                            <a href="{{ route('albums.view', $album->id) }}" class="btn btn-info m-1">Ver
                                {{ $isLoggedIn ? '/ Editar' : 'detalhes' }}</a>
                            @if ($isLoggedIn)
                                <a href="{{ route('albums.delete', $album->id) }}" class="btn btn-danger m-1">Apagar</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
