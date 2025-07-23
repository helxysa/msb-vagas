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
        Schema::create('vaga', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->nullable();
            $table->string('area')->nullable();
            $table->string('localizacao')->nullable();
            $table->string('descricao_da_vaga')->nullable();
            $table->string('responsabilidades')->nullable();
            $table->string('requisitos')->nullable();
            $table->string('beneficios')->nullable();
            $table->string('remuneracao')->nullable();
            $table->string('modalidade')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vaga');
    }
};
