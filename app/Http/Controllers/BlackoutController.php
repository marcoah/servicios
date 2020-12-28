<?php

namespace App\Http\Controllers;

use App\Blackout;
use App\Zona;
use Illuminate\Http\Request;

class BlackoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blackouts = Blackout::orderBy('id', 'asc')->paginate(10);
        return view('blackouts.index',compact('blackouts'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $zonas = Zona::All();
        return view('blackouts.create', compact('zonas'));
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
            'zona_id'=>'required',
            'FechaInicio'=>'required',
            'HoraInicio'=>'required',
            'FechaFinal'=>'required',
            'HoraFinal'=>'required'
        ]);

        Blackout::create($request->all());

        return redirect()->route('blackouts.index')->with('success','Apagon creado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blackout  $blackout
     * @return \Illuminate\Http\Response
     */
    public function show(Blackout $blackout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blackout  $blackout
     * @return \Illuminate\Http\Response
     */
    public function edit(Blackout $blackout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blackout  $blackout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blackout $blackout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blackout  $blackout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blackout $blackout)
    {
        //
    }
}
