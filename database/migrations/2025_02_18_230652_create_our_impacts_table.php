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
        Schema::create('our_impacts', function (Blueprint $table) {
            $table->id();

            // Títulos e subtítulos gerais
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();

            // Cartões de impacto
            $table->string('card_title1')->nullable();
            $table->text('card_description1')->nullable();
            $table->string('card_icon1')->nullable();

            $table->string('card_title2')->nullable();
            $table->text('card_description2')->nullable();
            $table->string('card_icon2')->nullable();

            $table->string('card_title3')->nullable();
            $table->text('card_description3')->nullable();
            $table->string('card_icon3')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('our_impacts');
    }
};
