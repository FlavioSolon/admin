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
        Schema::create('ombudsmen', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nome
            $table->string('email'); // Email
            $table->enum('channel', [
                'agricultor_e_produtor_parceiro',
                'representante_e_colaboradores',
                'varejo_e_industrias_parceiras',
                'parceiros_institucionais',
            ]); // Canal
            $table->text('message'); // Mensagem
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ombudsmen');
    }
};
