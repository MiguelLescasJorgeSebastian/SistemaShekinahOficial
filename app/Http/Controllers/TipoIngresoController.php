<?php

namespace App\Http\Controllers;

use App\Models\TipoIngreso;
use Illuminate\Http\Request;

class TipoIngresoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipoIngresos = TipoIngreso::all();
        return view('admin.tipo-ingreso.index', compact('tipoIngresos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tipo-ingreso.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
        ]);
        $tipoIngreso = TipoIngreso::create($request->all());
        return redirect()->route('admin.tipo-ingresos.index', compact('tipoIngreso'));
    }

    /**
     * Display the specified resource.
     */
    public function show(TipoIngreso $tipoIngreso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipoIngreso $tipoIngreso)
    {
        return view('admin.tipo-ingreso.edit', compact('tipoIngreso'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TipoIngreso $tipoIngreso)
    {
        //
        $this->validate($request, [
            'nombre' => 'required',
        ]);
        $tipoIngreso->update($request->all());
        return redirect()->route('admin.tipo-ingresos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoIngreso $tipoIngreso)
    {
        //
        TipoIngreso::destroy($tipoIngreso->id);
        return redirect()->route('admin.tipo-ingresos.index');
    }
}
