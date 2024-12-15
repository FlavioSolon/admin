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
        Schema::create('initial_impact', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('background_video')->nullable();


            $table->integer('waste_reduction_kg')->nullable();
            $table->string('waste_reduction_icon')->nullable();
            $table->string('waste_reduction_description')->nullable();

            $table->integer('regenerative_food_kg')->nullable();
            $table->string('regenerative_food_icon')->nullable();
            $table->string('regenerative_food_description')->nullable();

            $table->integer('cacao_farmers')->nullable();
            $table->string('cacao_farmers_icon')->nullable();
            $table->string('cacao_farmers_description')->nullable();

            $table->decimal('producer_income', 10, 2)->nullable();
            $table->string('producer_income_icon')->nullable();
            $table->string('producer_income_description')->nullable();

            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('initial_impact');
    }
};
