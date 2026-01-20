@extends('layouts.fe_master')

@section('content')
    <h3 class="my-3">Utilizadores</h3>

    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    @if (count($users) == 0)
        <a class="btn btn-primary mb-3" href="{{ route('users.add') }}">Adicionar utilizador</a>
        <p>Ainda não há utilizadores... :-(</p>
    @else
        <div class="row">
            <form class="d-flex mb-3 col-9" role="search" action="">
                <input class="form-control me-2" type="search" name="search" placeholder="Pesquisar ulilizador"
                    aria-label="Search user" />
                <button class="btn btn-outline-secondary" type="submit">Pesquisar</button>
            </form>
            <a class="btn btn-primary mb-3 col-3" href="{{ route('users.add') }}">Adicionar utilizador</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Email</th>
                    @auth
                        <th scope="col">Ações</th>
                    @endauth
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th class="align-middle" scope="row">{{ $user->id }}</th>
                        <td class="align-middle">{{ $user->name }}</td>
                        <td class="align-middle profile-image">
                            <img src="{{ $user->photo ? asset('storage/' . $user->photo) : asset('images/Profile_avatar_placeholder_large.png') }}"
                                alt="Imagem de perfil" style="width: 50px" class="rounded-circle">
                        </td>
                        <td class="align-middle">{{ $user->email }}</td>
                        @auth
                            <td class="align-middle">
                                <a href="{{ route('users.view', $user->id) }}" class="btn btn-info">Ver / Editar</a>

                                @if (Auth::user()->email == 'admin@gmail.com')
                                    <a href="{{ route('users.delete', $user->id) }}" class="btn btn-danger">Apagar</a>
                                @endif
                            </td>
                        @endauth
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

@endsection
