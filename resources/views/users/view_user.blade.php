@extends('layouts.fe_master')

@section('content')
    <h3 class="my-3">Detalhes do utilizador '{{ $user->name }}'</h3>

    <form method="post" action="{{ route('users.update') }}" class="col-6" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input type="hidden" name="id" value="{{ $user->id }}">

        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input name="name" type="text" class="form-control" id="name" value="{{ $user->name }}"
                aria-describedby="nameHelp" required>
        </div>
        @error('name')
            <p class="text-danger">Erro de nome</p>
        @enderror

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input name="email" type="email" class="form-control" id="email" value="{{ $user->email }}"
                aria-describedby="emailHelp" required disabled>
            <div id="emailHelp" class="form-text">Nunca partilharemos seu email com ninguém.</div>
        </div>
        @error('email')
            <p class="text-danger">Erro de email</p>
        @enderror

        <div class="mb-3">
            <label for="photo" class="form-label">Imagem de perfil</label>
            <input class="form-control" type="file" name="photo" id="photo" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
@endsection
