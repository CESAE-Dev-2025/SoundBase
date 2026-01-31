@extends('layouts.fe_master')

@section('title', 'Novo Álbum')

@section('content')

    @if ($selectedBand)
        <h3 class="my-3">Novo Álbum de <strong>{{ $selectedBand->name }}</strong></h3>
    @else
        <h3 class="my-3">Novo Álbum</h3>
    @endif

    <form method="post" action="{{ route('albums.store') }}" class="col-6">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Título do Álbum</label>
            <input name="title" type="text" class="form-control" id="title" aria-describedby="titleHelp" required>
        </div>
        @error('title')
        <p class="text-danger">Erro de título</p>
        @enderror

        <div class="mb-3">
            <label for="band_id" class="form-label">Banda</label>
            <select name="band_id" type="text" class="form-select" id="band_id" aria-describedby="band_idHelp" required>
                <option value="0" {{ $selectedBand ? '' : 'selected'}}>Selecione a banda</option>
                @foreach ($bands as $band)
                    <option
                        value="{{ $band->id }}" {{ $selectedBand && $selectedBand->id === $band->id ? 'selected' : ''}}>{{ $band->name }}</option>
                @endforeach
            </select>
        </div>
        @error('band_id')
        <p class="text-danger">Erro de banda</p>
        @enderror

        <div class="mb-3">
            <label for="release_date" class="form-label">Data de lançamento</label>
            <input name="release_date" type="date" class="form-control" id="release_date"
                   aria-describedby="release_dateHelp">
        </div>

        <button type="submit" class="btn btn-primary">Gravar</button>
    </form>
@endsection
