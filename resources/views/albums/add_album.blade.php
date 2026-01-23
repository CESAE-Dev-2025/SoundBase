@extends('layouts.fe_master')

@section('content')
    <h3 class="my-3">Novo Álbum de <strong>{{ $band->name }}</strong></h3>

    <form method="post" action="{{ route('albums.store') }}" class="col-6">
        @csrf

        <input type="hidden" name="bandId" value="{{ $band->id }}">

        <div class="mb-3">
            <label for="title" class="form-label">Título do Álbum</label>
            <input name="title" type="text" class="form-control" id="title" aria-describedby="titleHelp" required>
        </div>
        @error('title')
            <p class="text-danger">Erro de nome</p>
        @enderror

        <div class="mb-3">
            <label for="release_date" class="form-label">Data de lançamento</label>
            <input name="release_date" type="date" class="form-control" id="release_date"
                aria-describedby="release_dateHelp">
        </div>

        <button type="submit" class="btn btn-primary">Gravar</button>
    </form>
@endsection
