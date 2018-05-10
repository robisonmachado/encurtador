<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = Auth::user();
        if ($usuario->isAdmin()) {
            return redirect('encurtador');
        }else {
            $url="http://localhost:8000";
            return "<h1>ERRO</h1> <a href='$url'>VOLTAR</a>";
        }
        
    }
}
