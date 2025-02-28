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
        Schema::create('find_us_slides', function (Blueprint $table) {
            $table->id();
            $table->string('image_desktop'); // Imagem para desktop
            $table->string('image_mobile'); // Imagem para mobile
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('find_us_slides');
    }

};
