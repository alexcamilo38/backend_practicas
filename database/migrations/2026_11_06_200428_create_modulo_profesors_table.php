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
        Schema::create('modulo_profesors', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('modulo_id')->nullable();

           $table->foreign('modulo_id')
           ->references('id')
           ->on('modulos')
           ->onDelete('set null')
           ->onUpdate('set null');


           $table->unsignedBigInteger('profesor_id')->nullable();

           $table->foreign('profesor_id')
           ->references('id')
           ->on('profesors')
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
        Schema::dropIfExists('modulo_profesors');
    }
};
