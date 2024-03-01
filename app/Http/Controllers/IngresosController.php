<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\IngresoImport;
use App\Models\Ingresos;

class IngresosController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-ingreso|crear-ingreso|editar-ingreso|eliminar-ingreso', ['only' => ['index']]);
        $this->middleware('permission:crear-ingreso', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-ingreso', ['only' => ['edit', 'update']]);
        $this->middleware('permission:eliminar-ingreso', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ingresos = Ingresos::all();
        return view('admin.ingresos.index', compact('ingresos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ingresos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     
            $file = $request->file('documento');
            Excel::import(new IngresoImport, $file, \Maatwebsite\Excel\Excel::XLSX);
            return redirect()->route('admin.ingresos.index')->with('info', 'Ingreso creado con éxito');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ingresos $ingreso)
    {
        return view('admin.ingresos.edit', compact('ingreso'));
    }

    public function update(Request $request, Ingresos $ingreso)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'monto' => 'required',
            'tipo' => 'required',
        ]);
        $ingreso->update($request->all());

        return redirect()->route('admin.ingresos.index')->with('info', 'Ingreso actualizado con éxito');
    }

    public function destroy(Ingresos $ingreso)
    {
        $ingreso->delete();
        return redirect()->route('admin.ingresos.index')->with('info', 'Ingreso eliminado con éxito');
    }
}
