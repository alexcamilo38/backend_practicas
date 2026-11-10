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
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->date('fecha_nacimiento');
            $table->string('expediente');
            $table->string('imagen_url');
            $table->string('imagen_public_id');

            $table->unsignedBigInteger('modulo_id')->nullable();

           $table->foreign('modulo_id')
           ->references('id')
           ->on('modulos')
           ->onDelete('set null')
           ->onUpdate('set null');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnos');
    }
};
