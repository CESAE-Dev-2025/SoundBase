@extends('layouts.fe_master')

@use('App\Enums\UserType')

@php
    $isAdmin = Auth::user()->user_type == UserType::ADMIN;
@endphp

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
            <form class="d-flex mb-3 col" role="search" action="">
                <input class="form-control me-2" type="search" name="search" placeholder="Pesquisar ulilizador"
                    aria-label="Search user" />
                <button class="btn btn-outline-secondary" type="submit">Pesquisar</button>
            </form>
            <a class="btn btn-primary mb-3 col-3 col-lg-2" href="{{ route('users.add') }}">Adicionar utilizador</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col" class="col-1">#</th>
                    <th scope="col" class="col-1">Foto</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col" class="col-3 {{ $isAdmin ? '' : 'col-lg-2' }}">Ações</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($users as $user)
                    <tr>
                        <th class="align-middle col-1">{{ $user->id }}</th>
                        <td class="align-middle profile-image col-1">
                            <img src="{{ $user->photo ? asset('storage/' . $user->photo) : asset('images/Profile_avatar_placeholder_large.png') }}"
                                alt="Imagem de perfil" class="rounded-circle" id="profile-picture">
                        </td>
                        <td class="align-middle">{{ $user->name }}</td>
                        <td class="align-middle">{{ $user->email }}</td>
                        @auth
                            <td class="align-middle text-center col-3 {{ $isAdmin ? '' : 'col-lg-2' }}">
                                <a href="{{ route('users.view', $user->id) }}" class="btn btn-info m-1">Ver / Editar</a>

                                @if ($isAdmin)
                                    <a href="{{ route('users.delete', $user->id) }}" class="btn btn-danger m-1">Apagar</a>
                                @endif
                            </td>
                        @endauth
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

@endsection
