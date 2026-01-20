@extends('layouts.fe_master')

@use('App\Enums\UserType')

@section('content')
    <h3 class="my-3">Olá, {{ Auth::user()->name }}</h3>

    @if (Auth::user()->user_type == UserType::ADMIN)
        <div class="alert alert-danger" role="alert">
            Cuidado! Você fez login como 'Admin' e tem permissões perigosas!
        </div>
    @endif
@endsection
