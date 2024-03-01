<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permisos = [
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'eliminar-rol',
            'ver-ingreso',
            'crear-ingreso',
            'editar-ingreso',
            'eliminar-ingreso',
            'ver-usuario',
            'crear-usuario',
            'editar-usuario',
            'eliminar-usuario',
        ];
        foreach ($permisos as $permiso) {
            Permission::create(['name' => $permiso]);
        }
    }
}
