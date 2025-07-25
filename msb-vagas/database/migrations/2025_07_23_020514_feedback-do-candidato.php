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
        Schema::create('feedback_do_candidato', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->nullable();
            $table->string('tipo_de_feedback')->nullable();
            $table->string('comentario')->nullable();
            $table->foreignId('candidato_id')->constrained('candidato')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback_do_candidato');
    }
};
