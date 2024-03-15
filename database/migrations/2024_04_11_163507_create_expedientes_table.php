<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    /*public function up(): void
    {
        Schema::create('expedientes', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->date('fecha_cierre');
            $table->string('empleador');
            $table->string('empleado');
            $table->string('cuit_empleado');
            $table->string('dni_empleado');
            $table->string('estado');
            $table->string('descripcion');
            $table->timestamps();
        });
    }*/

    public function up(): void
    {
        Schema::create('expedientes', function (Blueprint $table) {
            $table->id();
            $table->string('numero_expediente');
            $table->date('fecha_entrada');
            $table->string('iniciador');
            $table->string('extracto');
            $table->text('antecedentes');
            $table->text('agregados');
            $table->unsignedBigInteger('delegacion_id')->nullable(); // Permitir valores nulos
            $table->foreign('delegacion_id')->references('id')->on('delegaciones')->onDelete('cascade');
            $table->unsignedBigInteger('seccion_id')->nullable(); // Permitir valores nulos
            $table->foreign('seccion_id')->references('id')->on('secciones')->onDelete('cascade');
        
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expedientes');
    }
};
