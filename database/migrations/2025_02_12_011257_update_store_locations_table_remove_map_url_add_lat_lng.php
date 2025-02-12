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
            // Remove o campo map_url
            $table->dropColumn('map_url');

            // Adiciona os campos latitude e longitude
            $table->decimal('latitude', 10, 7)->nullable()->after('name');
            $table->decimal('longitude', 10, 7)->nullable()->after('latitude');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('store_locations', function (Blueprint $table) {
            // Adiciona novamente o campo map_url
            $table->text('map_url')->after('name');

            // Remove os campos latitude e longitude
            $table->dropColumn(['latitude', 'longitude']);
        });
    }

};
