<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ingresos extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'monto',
        'tipo_ingreso_id',
        'descripcion'
    ];
    public function tipoIngreso():BelongsTo
    {
        return $this->belongsTo(TipoIngreso::class);
    }
}
