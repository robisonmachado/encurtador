@extends('layouts.maistv')

@section('style')

@endsection

@section('content')
                <div class="title">
                    +ENCURTADOR
                </div>
                <div class="subtitle">
                    o seu encurtador muito +rápido!
                </div>

                @auth
                @if ( Auth::user()->isAdmin() )
                <form action="{{ url('encurtador') }}" method="POST" class="d-flex flex-column">
                    @csrf

                    
                    <label for="url_destino" class"">URL DESTINO</label>
                    <input type="text" name="url_destino" id="url_destino">

                    <label for="alias">ALIAS</label>
                    <input type="text" name="alias" id="alias">

                    <label for="observacoes">OBSERVAÇÕES</label>
                    <textarea name="observacoes" id="observacoes" cols="30" rows="10"></textarea>
                    
                    <label for="validade">VALIDADE</label>
                    <input type="date" name="validade" id="validade">
                    
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                    <input type="submit" value="ENCURTAR" class="btn btn-primary">
                    
                </form>
                            
                @endif
    
                @endauth


@endsection

