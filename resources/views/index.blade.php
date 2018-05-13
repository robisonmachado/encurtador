@extends('layouts.maistv')

@section('style')

@endsection

@section('content')
                <div class="d-flex flex-column">
                    <div class="title">
                        +ENCURTADOR
                    </div>
                    <div class="subtitle">
                        o seu encurtador muito +rápido!
                    </div>
                </div>
                
                @auth
                @if ( Auth::user()->isAdmin() )
                <form action="{{ url('encurtador') }}" id="formURL" method="POST" class="form-encurtador d-flex flex-column justify-content-center align-items-center">
                    @csrf

                    <label for="url_destino" class"col-12">URL DESTINO</label>
                    <input type="text" name="url_destino" id="url_destino" class="col-12 col-md-10">

                    <label for="alias" class="col-12">ALIAS</label>
                    <input type="text" name="alias" id="alias" class="col-12 col-md-10">

                    <label for="observacoes" class="col-12">OBSERVAÇÕES</label>
                    <textarea name="observacoes" id="observacoes" class="col-12 col-md-10"></textarea>
                    
                    <label for="validade" class="col-12">VALIDADE</label>
                    <input type="date" name="validade" id="validade" class="col-12 col-md-10">
                    
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                    <input type="submit" value="ENCURTAR" class="submit btn btn-primary">
                    
                </form>
                  
                <ul class="lista-urls d-flex flex-column justify-content-center align-items-center">
                @foreach($urls_encurtadas as $url_encurtada)
                    <li class="url w-100 row justify-content-center align-items-center">
                        <div class="alias col-12 col-lg-9 text-truncate">{{ $url_encurtada->alias }}</div>
                        <a class="btn btn-primary col-5 col-lg-auto"
                            id="editButton"
                            href="{{ url('/encurtador/'.$url_encurtada->id.'/edit') }}">EDITAR</a>
                        <a class="btn btn-primary col-5 col-lg-auto" 
                            id="deleteButton" 
                            onclick="excluirURL({{ $url_encurtada->id}})">EXCLUIR</a>
                    </li>
                @endforeach
                </ul>

                <form action="{{ url('/encurtador/') }}" method="POST" id="formDestroyURL">
                    @method('DELETE')
                    @csrf
                </form>

                <script>
                    function excluirURL(url_id){
                        action = '{{ url('/encurtador') }}/'+url_id;
                        formDestroy = $("#formDestroyURL");
                        formDestroy.attr(
                            'action', action
                            );

                        teste = formDestroy.attr('action');
                        console.log( teste );
                        if(confirm('Deseja realmente excluir o ALIAS')){
                            formDestroy.submit();
                        }
                        
                        
                    }
                    

                </script>

                @endif
    
                @endauth


@endsection

