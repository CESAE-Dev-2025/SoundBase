@extends('layouts.fe_master')

@use('App\Enums\UserType')

@php
    $isLoggedIn = Auth::user() != null;
    $isAdmin = $isLoggedIn && Auth::user()->user_type == UserType::ADMIN;
@endphp

@section('content')

    <h3 class="my-3">Bandas</h3>


    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    @if ($isLoggedIn)
        <a class="btn btn-primary mb-3" href="{{ route('bands.add') }}">Adicionar banda</a>
    @endif

    @if (count($bands) == 0)
        <p>Ainda não há bandas... :-(</p>
    @else
        <div class="d-flex gap-2">
            <form class="d-flex mb-3 col" role="search" action="">
                <input class="form-control me-2" type="search" name="search" placeholder="Pesquisar banda"
                    aria-label="Search task" />
                <button class="btn btn-outline-secondary" type="submit">Pesquisar</button>
            </form>
            @if ($isLoggedIn)
                <a class="btn btn-primary mb-3 col-3 col-lg-2" href="{{ route('bands.add') }}">Adicionar banda</a>
            @endif
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col" class="text-center col-1">#</th>
                    <th scope="col" class="text-center col-1">Foto</th>
                    <th scope="col">Nome</th>
                    <th scope="col" class="text-center col-1">Albums</th>
                    <th scope="col" class="text-center col-3">Ações</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($bands as $band)
                    <tr>
                        <th class="align-middle text-center col-1" scope="row">{{ $band->id }}</th>
                        <td class="align-middle profile-image text-center col-1">
                            {{-- TODO: Adicionar imagem da banda --}}
                            <img src="{{ $band->photo ? asset('storage/' . $band->photo) : asset('images/Profile_avatar_placeholder_large.png') }}"
                                alt="Imagem de perfil" class="rounded-circle" id="profile-picture">
                        </td>
                        <td class="align-middle">{{ $band->name }}</td>
                        <td class="align-middle text-center col-1">{{ $band->albums }}</td>
                        <td class="align-middle text-center col-3">
                            <a href="{{ route('bands.view', $band->id) }}" class="btn btn-info m-1">Ver
                                {{ $isLoggedIn ? '/ Editar' : 'detalhes' }}</a>
                            @if ($isLoggedIn)
                                <a href="{{ route('bands.delete', $band->id) }}" class="btn btn-danger m-1">Apagar</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

@endsection
