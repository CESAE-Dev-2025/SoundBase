@extends('layouts.fe_master')

@section('title', "Informações de $band->strArtist")

@section('content')

    <img class="w-100 my-5" src="{{ $band->strArtistBanner }}">

    <div class="row">
        <div class="col-3">
            <h2>Detalhes</h2>

            <dl class="mt-3">
                <dt>Ano de formação</dt>
                <dd>{{ $band->intFormedYear }}</dd>

                @if($band->strDisbanded)
                    <dt>Ano de término</dt>
                    <dd>{{ $band->intDiedYear }}</dd>
                @endif

                <dt>Estilo</dt>
                <dd>{{ $band->strStyle }}</dd>

                <dt>Género</dt>
                <dd>{{ $band->strGenre }}</dd>

                @if($band->strWebsite)
                    <dt>Site oficial</dt>
                    <dd><a href="http://{{ $band->strWebsite }}">{{ $band->strWebsite }}</a></dd>
                @endif

                @if($band->strFacebook)
                    <dt>Facebook</dt>
                    <dd><a href="http://{{ $band->strFacebook }}" target="_blank">{{ $band->strFacebook }}</a></dd>
                @endif

                <dt>Número de membros</dt>
                <dd>{{ $band->intMembers }}</dd>

                <dt>País</dt>
                <dd>{{ $band->strCountry }} / {{ $band->strCountryCode }}</dd>
            </dl>
        </div>

        <div class="col-9">
            <h2>Biografia</h2>
            <p>{{ $band->strBiographyPT }}</p>
        </div>
    </div>

@endsection
