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
        Schema::create('people', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained('users');
            $table->string('nome');
            $table->string('numAcesso');
            $table->string('visita');
            $table->string('patientID');
            $table->date('data');
            $table->string('modalidade');
            $table->string('tipoExame');
            $table->string('numero');
            $table->string('estado');
            $table->string('medSol');
            $table->string('laudo');
            $table->string('sexo');
            $table->string('especial');
            $table->string('urgente');
            $table->string('restaurado');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};
