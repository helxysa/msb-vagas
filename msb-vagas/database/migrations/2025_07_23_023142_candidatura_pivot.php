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
        Schema::create('candidatura_pivot', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidato_id')->constrained('candidato')->onDelete('cascade');
            $table->foreignId('vaga_id')->constrained('vaga')->onDelete('cascade');
            $table->string('status')->default('pendente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidatura_pivot');
    }
};
