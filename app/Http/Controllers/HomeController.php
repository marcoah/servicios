<?php

namespace App\Http\Controllers;

use App\Blackout;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('escritorio.escritorio');
    }

    public function settings()
    {
        return view('escritorio.settings');
    }

    public function profile()
    {
        return view('escritorio.profile');
    }

    public function search($search){
        $search = urldecode($search);

        $empresa = Blackout::where('razon_social','LIKE','%'.$search.'%');

        $correo = Blackout::where('email','LIKE','%'.$search.'%');
        $celular = Blackout::where('celular','LIKE','%'.$search.'%');
        $telefono = Blackout::where('telefono','LIKE','%'.$search.'%');

        $nombres = Blackout::where('nombres', 'LIKE', '%'.$search.'%');

        $resultados = Blackout::where('apellidos', 'LIKE', '%'.$search.'%')
            ->union($empresa)
            ->union($correo)
            ->union($celular)
            ->union($telefono)
            ->union($nombres)
            ->paginate(10);

        if (count($resultados) == 0){
            return View('escritorio.search')
            ->with('message', 'No hay resultados que mostrar')
            ->with('search', $search);
        } else{
            return View('escritorio.search')
            ->with('resultados', $resultados)
            ->with('search', $search);
        }
    }
}
