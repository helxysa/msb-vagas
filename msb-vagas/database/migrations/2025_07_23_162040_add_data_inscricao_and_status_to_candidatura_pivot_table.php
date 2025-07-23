<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('candidatura_pivot', function (Blueprint $table) {
        $table->timestamp('data_inscricao')->nullable();
        $table->string('status_candidatura')->nullable();
    });
}

public function down()
{
    Schema::table('candidatura_pivot', function (Blueprint $table) {
        $table->dropColumn('data_inscricao');
        $table->dropColumn('status_candidatura');
    });
}
};
