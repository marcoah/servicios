<?php

namespace App\Http\Controllers;

use App\Zona;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;

class ZonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zonas = Zona::orderBy('id', 'asc')->paginate(10);
        return view('zonas.index',compact('zonas'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('zonas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_zona'=>'required'
        ]);

        Zona::create($request->all());

        return redirect()->route('zonas.index')->with('success','Zona creado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Zona  $zona
     * @return \Illuminate\Http\Response
     */
    public function show(Zona $zona)
    {
        return view('zonas.show',compact('zona'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Zonas  $zonas
     * @return \Illuminate\Http\Response
     */
    public function edit(Zona $zona)
    {
        return view('zonas.edit', compact('zona'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Zonas  $zonas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Zona $zona)
    {
        $request->validate([
            'nombre_zona'=>'required'
        ]);

        $zona->update($request->all());
        return redirect()->route('zonas.index')->with('success','zona actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Zonas  $zonas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Zona $zona)
    {
        $zona->delete();
        return redirect()->route('zonas.index')->with('success','zona eliminado correctamente.');
    }

    public function getZonas(Request $request)
    {
        $data = Zona::latest()->get();

        return Datatables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function($zona){
            $actionBtn = "<a class='btn btn-success btn-sm' href=". route('zonas.edit',$zona->id) ."><i class='fas fa-edit'></i></a>";
            $actionBtn = $actionBtn ." <a class='btn btn-primary btn-sm' href=".route('zonas.show',$zona->id)." data-toggle='tooltip' data-placement='top' title='Mostrar'><i class='fas fa-eye'></i></a>";

            $user = Auth::user();
            if ($user->can('Eliminar Zona')){
                $actionBtn = $actionBtn ." <a class='btn btn-danger btn-sm' href='#' onclick='mostrarmodal(".$zona->id.")' data-toggle='tooltip' data-placement='top' title='Eliminar'><i class='fas fa-trash-alt'></i></a>";
            }

            return $actionBtn;
        })
        ->rawColumns(['action'])
        ->make(true);

    }
}
