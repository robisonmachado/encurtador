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
            return view('admin.admin_home');
        }elseif($usuario->isCliente()) {
            return redirect('usuarios');
        }
        
    }
}
