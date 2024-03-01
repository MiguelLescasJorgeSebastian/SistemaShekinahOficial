<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoIngreso extends Model
{
    use HasFactory;
    protected $fillable = ['nombre'];
    
    public function ingresos():HasMany
    {
        return $this->hasMany(Ingresos::class);
    }

}
