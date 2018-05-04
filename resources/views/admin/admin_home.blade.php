@extends('layouts.maistv')

@section('style')

@endsection

@section('content')
                <div class="title">
                    +TV
                </div>
                <div class="subtitle">
                    muito + diversão para você!
                </div>

                <div class="links row justify-content-around align-items-center">
                    @auth
                    <a href="{{ url('/filmes') }}">Filmes</a>
                    <a href="{{ url('/series') }}">Séries</a>
                    <a href="{{ url('/shows') }}">Shows</a>
                    <a href="{{ url('/musicas') }}">Músicas</a>
                    @endauth
                </div>

@endsection

