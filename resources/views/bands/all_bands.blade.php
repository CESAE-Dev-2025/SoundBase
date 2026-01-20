@extends('layouts.fe_master')

@section('content')

    <h3 class="my-3">Bandas</h3>


    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    @if (count($bands) == 0)
        <a class="btn btn-primary mb-3" href="{{ route('bands.add') }}">Adicionar banda</a>
        <p>Ainda não há bandas... :-(</p>
    @else
        <div class="row">
            <form class="d-flex mb-3 col-9" role="search" action="">
                <input class="form-control me-2" type="search" name="search" placeholder="Pesquisar banda"
                    aria-label="Search task" />
                <button class="btn btn-outline-secondary" type="submit">Pesquisar</button>
            </form>
            <a class="btn btn-primary mb-3 col-3" href="{{ route('bands.add') }}">Adicionar banda</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Albums</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bands as $band)
                    <tr>
                        <th class="align-middle" scope="row">{{ $band->id }}</th>
                        <td class="align-middle">{{ $band->name }}</td>
                        <td class="align-middle">{{ $band->photo }}</td>
                        <td class="align-middle">{{ $band->albums }}</td>
                        <td class="align-middle">
                            <a href="{{ route('bands.view', $band->id) }}" class="btn btn-info">Ver / Editar</a>
                            <a href="{{ route('bands.delete', $band->id) }}" class="btn btn-danger">Apagar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

@endsection
