<?php

namespace App\Http\Controllers;

use App\Encurtador;
use Illuminate\Http\Request;

class EncurtadorController extends Controller
{
    protected static $index_url;
    function __construct(){
        self::$index_url = url('/');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($quantidade=100, $pagina=1)
    {
        $urls_encurtadas = Encurtador::orderBy('alias')->get();
        //dd($urls_encurtadas);

        return view('index',[
            'urls_encurtadas' => $urls_encurtadas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->user_id);
        if($request->url_destino && $request->alias && $request->user_id){
            if(Encurtador::where('alias', $request->alias)->first()){
                return "<h1>ERRO: JÁ EXISTE ALIAS</h1> <a href='".self::$index_url."'>VOLTAR</a>";
            }
            $encurtador = new Encurtador;
            $encurtador = $encurtador->create($request->all());

            if($encurtador){
                echo "<h1>ALIAS CRIADO COM SUCESSO</h1> <a href='".self::$index_url."'>VOLTAR</a>";
                echo "<p>DESTINO: $encurtador->url_destino</p>";
                echo "<p>ALIAS: $encurtador->alias</p>";
                return;
            }else{
                return "<h1>UM ERRO OCORREU</h1> <a href='".self::$index_url."'>VOLTAR</a>";
            }  
        }else{
            return "<h1>ERRO: DADOS NECESSÁRIOS NÃO ENCONTRADOS</h1> <a href='".self::$index_url."'>VOLTAR</a>";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Encurtador  $encurtador
     * @return \Illuminate\Http\Response
     */
    public function show(Encurtador $encurtador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Encurtador  $encurtador
     * @return \Illuminate\Http\Response
     */
    public function edit(Encurtador $encurtador)
    {
        //dd('form edit url');
        return view('form_edit_url',[
            'url_encurtada' => $encurtador
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Encurtador  $encurtador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Encurtador $encurtador)
    {
        $encurtador->update($request->all());
        echo "<h1>ALIAS EDITADO COM SUCESSO</h1> <a href='".self::$index_url."'>VOLTAR</a>";
        echo "<p>DESTINO: $encurtador->url_destino</p>";
        echo "<p>ALIAS: $encurtador->alias</p>";
        return;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Encurtador  $encurtador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Encurtador $encurtador)
    {
        //dd($encurtador);
        Encurtador::destroy($encurtador->id);
        return redirect('/');
    }

    public function redirect(string $alias)
    {
        //dd($alias);
        $encurtador = Encurtador::where('alias', $alias)->first();
        if($encurtador){
            return redirect($encurtador->url_destino);
        }
        
    }

}
