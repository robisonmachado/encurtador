@extends('layouts.maistv')

@section('style')

@endsection

@section('content')
                <div class="d-flex flex-column">
                    <div class="title">
                        +ENCURTADOR
                    </div>
                    <div class="subtitle">
                        EDIÇÃO DE URL
                    </div>
                </div>
                
                @auth
                @if ( Auth::user()->isAdmin() )
                <form action="{{ url('encurtador/'.$url_encurtada->id) }}" id="formURL" method="POST" class="form-encurtador d-flex flex-column justify-content-center align-items-center">
                    @csrf
                    @method('PUT')

                    <label for="url_destino" class"col-12">URL DESTINO</label>
                    <input type="text" name="url_destino" id="url_destino" class="col-12 col-md-10" value="{{ $url_encurtada->url_destino }}">

                    <label for="alias" class="col-12">ALIAS</label>
                    <input type="text" name="alias" id="alias" class="col-12 col-md-10" value="{{ $url_encurtada->alias }}">

                    <label for="observacoes" class="col-12">OBSERVAÇÕES</label>
                    <textarea name="observacoes" id="observacoes" class="col-12 col-md-10">{{ $url_encurtada->observacoes }}</textarea>
                    
                    <label for="validade" class="col-12">VALIDADE</label>
                    <input type="date" name="validade" id="validade" class="col-12 col-md-10" value="{{ date($url_encurtada->validade) }}">
                    
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    
                    
                    

                    <input type="submit" value="EDITAR" class="submit btn btn-primary">
                    
                </form>
                  
                
                @endif
    
                @endauth


@endsection

