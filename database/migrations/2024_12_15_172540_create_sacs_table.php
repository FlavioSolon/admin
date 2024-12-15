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
        Schema::create('sacs', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nome
            $table->string('email'); // Email
            $table->string('reported_product'); // Produto Relatado
            $table->text('reported_problem'); // Problema Relatado
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sacs');
    }
};
