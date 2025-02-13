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
        Schema::table('store_locations', function (Blueprint $table) {
            // Remove as colunas latitude e longitude
            $table->dropColumn(['latitude', 'longitude']);

            // Adiciona a coluna para armazenar o iframe do Google Maps
            $table->text('iframe')->nullable()->after('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('store_locations', function (Blueprint $table) {
            // Restaura as colunas removidas
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();

            // Remove a coluna iframe
            $table->dropColumn('iframe');
        });
    }
};
