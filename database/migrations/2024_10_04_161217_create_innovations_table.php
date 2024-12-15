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
        Schema::create('innovations', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();  // Permite null
            $table->string('subtitle')->nullable();  // Permite null

            // Campos para os 3 cards
            $table->string('card_title1')->nullable();  // Permite null
            $table->text('card_description1')->nullable();  // Permite null
            $table->string('card_icon1')->nullable();  // Permite null

            $table->string('card_title2')->nullable();  // Permite null
            $table->text('card_description2')->nullable();  // Permite null
            $table->string('card_icon2')->nullable();  // Permite null

            $table->string('card_title3')->nullable();  // Permite null
            $table->text('card_description3')->nullable();  // Permite null
            $table->string('card_icon3')->nullable();  // Permite null

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('innovations');
    }
};
