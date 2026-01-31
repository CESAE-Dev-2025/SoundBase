@extends('layouts.fe_master')

@use('App\Enums\UserType')

@section('content')
    <h1 class="my-3">{{ $album->title }} | {{ $selectedBand->name }}</h1>

    <div class="row">

        <img src="{{ $album->photo ? asset('storage/' . $album->photo) : asset('images/no_album_cover.jpg') }}"
             alt="Imagem do álbum" class="col-4">

        <form method="post" action="{{ route('albums.update') }}" class="col-8" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <input type="hidden" name="id" value="{{ $album->id }}">
            <input type="hidden" name="band_id" value="{{ $album->band_id }}">

            <div class="mb-3">
                <label for="title" class="form-label">Título do Álbum</label>
                <input name="title" type="text" class="form-control" id="title" value="{{ $album->title }}"
                       aria-describedby="titleHelp" required {{ Auth::user() ? '' : 'readonly' }}>
            </div>
            @error('title')
            <p class="text-danger">Erro de título</p>
            @enderror

            <div class="mb-3">
                <label for="band_id" class="form-label">Banda</label>
                <select name="band_id" type="text" class="form-select" id="band_id" aria-describedby="band_idHelp"
                        required {{ Auth::user() ? '' : 'disabled' }}>
                    <option value="0">Selecione a banda</option>
                    @foreach ($bands as $band)
                        <option
                            value="{{ $band->id }}" {{ $selectedBand->id === $band->id ? 'selected' : ''}}>{{ $band->name }}</option>
                    @endforeach
                </select>
            </div>
            @error('band_id')
            <p class="text-danger">Erro de banda</p>
            @enderror

            <div class="mb-3">
                <label for="release_date" class="form-label">Data de lançamento</label>
                <input name="release_date" type="date" class="form-control" id="release-date"
                       value="{{ $album->release_date }}" aria-describedby="release_dateHelp" required
                    {{ Auth::user() ? '' : 'readonly' }}>
            </div>
            @error('release-date')
            <p class="text-danger">Erro de data de lançamento</p>
            @enderror

            @auth
                <div class="mb-3">
                    <label for="photo" class="form-label">Imagem do álbum</label>
                    <input class="form-control" type="file" name="photo" id="photo" accept="image/*">
                </div>

                <button type="submit" class="btn btn-primary">Atualizar</button>
            @endauth
        </form>
    </div>
@endsection
