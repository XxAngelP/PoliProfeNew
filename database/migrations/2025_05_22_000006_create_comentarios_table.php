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
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('profesores_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('materia_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->tinyInteger('r_dm');
            $table->tinyInteger('r_ce');
            $table->tinyInteger('r_mia');
            $table->tinyInteger('r_oc');
            $table->tinyInteger('r_ru');
            $table->tinyInteger('r_drd');
            $table->tinyInteger('r_ejr');
            $table->tinyInteger('r_rte');
            $table->tinyInteger('r_ra');
            $table->text('r_com');
            $table->tinyInteger('estatus')->default(0);
            $table->text('cm',80)->nullable();
            $table->timestamps();

            $table->index('profesores_id');
            $table->index('materia_id');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comentarios');
    }
};
