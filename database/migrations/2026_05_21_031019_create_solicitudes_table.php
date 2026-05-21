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
        Schema::create('solicitudes', function (Blueprint $table) {
    $table->id();
    $table->string('correo_solicitante');
    $table->string('nombre_solicitante');
    $table->text('descripcion');
    $table->string('estado');
    $table->date('fecha');
    $table->foreignId('cliente_id')->constrained('clientes')->onDelete('cascade');
    $table->foreignId('consultoria_id')->constrained('consultorias')->onDelete('cascade');
    $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('cascade');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitudes');
    }
};
