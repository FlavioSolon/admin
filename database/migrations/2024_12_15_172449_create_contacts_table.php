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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nome
            $table->string('email'); // Email
            $table->enum('sector', [
                'varejo_e_industria',
                'apoio_ao_produtor',
                'parcerias_e_imprensa',
            ]); // Setor
            $table->enum('reason', [
                'duvidas_e_suporte',
                'elogios',
                'reclamacoes',
                'propostas',
            ]); // Motivo
            $table->text('message'); // Mensagem
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
