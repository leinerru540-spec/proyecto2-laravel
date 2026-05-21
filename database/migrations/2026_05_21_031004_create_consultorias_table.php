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
       Schema::create('consultorias - 2026_05_21_031004_create_consultorias_table.php:14', function (Blueprint $table) {
    $table->id();
    $table->string('descripcion');
    $table->string('tipo');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultorias');
    }
};
