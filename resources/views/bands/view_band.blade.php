@extends('layouts.fe_master')

@section('content')
    <h3 class="my-3">Detalhes da banda '{{ $band->name }}'</h3>

    <form method="post" action="{{ route('bands.update') }}" class="col-6">
        @csrf
        @method('PUT')

        <input type="hidden" name="id" value="{{ $band->id }}">

        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input name="name" type="text" class="form-control" id="name" value="{{ $band->name }}"
                aria-describedby="nameHelp" required>
        </div>
        @error('name')
            <p class="text-danger">Erro de nome</p>
        @enderror

        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
@endsection
