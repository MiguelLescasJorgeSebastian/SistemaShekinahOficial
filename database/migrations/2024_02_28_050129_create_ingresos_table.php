<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ingresos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_ingreso_id'); 
            $table->string('nombre', 100);
            $table->decimal('monto', 11, 2);
            $table->string('descripcion', 256)->nullable();
            $table->timestamps();

            $table->foreign('tipo_ingreso_id')->references('id')->on('tipo_ingresos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingresos');
    }
};
