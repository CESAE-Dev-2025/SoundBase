@extends('layouts.fe_master')

@use('App\Enums\UserType')

@php
    $isAdmin = Auth::user() == null ? false : Auth::user()->user_type == UserType::ADMIN;
@endphp

@section('content')
    <h3 class="my-3">Detalhes do álbum '{{ $album->title }}'</h3>

    <div class="d-flex">
        <form method="post" action="{{ route('albums.update') }}" class="col-6" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <input type="hidden" name="id" value="{{ $album->id }}">
            <input type="hidden" name="band_id" value="{{ $album->band_id }}">

            <div class="mb-3">
                <label for="title" class="form-label">Título do Álbum</label>
                <input name="title" type="text" class="form-control" id="title" value="{{ $album->title }}"
                    aria-describedby="titleHelp" required {{ $isAdmin ? '' : 'readonly' }}>
            </div>
            @error('title')
                <p class="text-danger">Erro de título</p>
            @enderror

            <div class="mb-3">
                <label for="release_date" class="form-label">Data de lançamento</label>
                <input name="release_date" type="text" class="form-control" id="release-date"
                    value="{{ $album->release_date }}" aria-describedby="release_dateHelp" required
                    {{ $isAdmin ? '' : 'readonly' }}>
            </div>
            @error('release-date')
                <p class="text-danger">Erro de data de lançamento</p>
            @enderror

            <div class="mb-3">
                <label for="photo" class="form-label">Imagem do álbum</label>
                <input class="form-control" type="file" name="photo" id="photo" accept="image/*"
                    {{ $isAdmin ? '' : 'disabled' }}>
            </div>

            @if ($isAdmin)
                <button type="submit" class="btn btn-primary">Atualizar</button>
            @endif
        </form>
        <img src="{{ $album->photo ? asset('storage/' . $album->photo) : asset('images/no_album_cover.jpg') }}"
            alt="Imagem do álbum" class="ms-auto me-0 col-3">
    </div>
@endsection
