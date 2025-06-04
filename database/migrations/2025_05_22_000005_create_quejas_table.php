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
        Schema::create('quejas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('c_queja_id');
            $table->foreignId('profesores_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('users_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->text('comentario',256);
            $table->boolean('estatus')->default(0);
            $table->text('cm',45)->nullable();
            $table->timestamps();

            $table->foreign('c_queja_id')->references('id')->on('c_quejas')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quejas');
    }
};
