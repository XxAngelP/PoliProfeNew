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
        Schema::create('profesor_materias', function (Blueprint $table) {
            $table->id();
           $table->foreignId('profesores_id')->constrained()->onDelete('cascade')->onUpdate('cascade'); 
           $table->foreignId('materias_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profesor_materias');
    }
};
