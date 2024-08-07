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
        Schema::create('landings', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('email');
            $table->integer('telefono');
            $table->string('cargo')->nullable();
            $table->string('empresa')->nullable();
            $table->string('mensaje')->nullable();
            $table->string('tipocontacto')->nullable();
            $table->string('urlweb')->nullable();
            $table->string('source')->nullable();
            $table->string('fecha')->nullable();
            $table->string('hora')->nullable();
            $table->string('lead')->nullable();
            $table->string('ip')->nullable();
            $table->string('llegade')->nullable();
            $table->string('anchodispositivo')->nullable();
            $table->string('largodispositivo')->nullable();
            $table->string('latitud')->nullable();
            $table->string('longitud')->nullable();
            $table->string('sistema')->nullable();
            $table->boolean('status')->default(true)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('landings');
    }
};
