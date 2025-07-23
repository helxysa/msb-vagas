<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('avaliacao_do_candidato', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidato_id')->constrained('candidato')->onDelete('cascade');
            $table->string('comentario')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('avaliacao_do_candidato');
    }
};