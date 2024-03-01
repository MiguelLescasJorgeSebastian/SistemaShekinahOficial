<?php

namespace App\Imports;
use App\Models\Ingresos;
use App\Models\TipoIngreso;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class IngresoImport implements ToModel, WithHeadingRow
{

    public function model(array $row)
    {
        $tipoIngreso = TipoIngreso::where('nombre', $row['tipo_ingreso'])->first();

        if(!$row['nombre']){
            return null;}

        return new Ingresos([
            'nombre' => $row['nombre'],
            'monto' =>  $row['monto'],
            'tipo_ingreso_id' => $tipoIngreso->id,
            'descripcion' => $row['descripcion']
        ]);


    }
}
