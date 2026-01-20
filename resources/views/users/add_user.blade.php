@extends('layouts.fe_master')

@section('content')
    <h3 class="my-3">Novo utilizador</h3>

    <form method="post" action="{{ route('users.store') }}" class="col-6">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input name="name" type="text" class="form-control" id="name" aria-describedby="nameHelp" required>
        </div>
        @error('name')
            <p class="text-danger">Erro de nome</p>
        @enderror

        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" required>
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        @error('email')
            <p class="text-danger">Erro de email</p>
        @enderror

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input name="password" type="password" class="form-control" id="password" required>
        </div>
        @error('password')
            <p class="text-danger">Erro de password</p>
        @enderror

        <button type="submit" class="btn btn-primary">Gravar</button>
    </form>
@endsection
