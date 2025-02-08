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
        Schema::table('product_features', function (Blueprint $table) {
            $table->string('card_title1')->nullable()->after('subtitle');
            $table->text('card_description1')->nullable()->after('card_title1');
            $table->string('card_icon1')->nullable()->after('card_description1');

            $table->string('card_title2')->nullable()->after('card_icon1');
            $table->text('card_description2')->nullable()->after('card_title2');
            $table->string('card_icon2')->nullable()->after('card_description2');

            $table->string('card_title3')->nullable()->after('card_icon2');
            $table->text('card_description3')->nullable()->after('card_title3');
            $table->string('card_icon3')->nullable()->after('card_description3');

            // Remove o campo JSON 'cards'
            $table->dropColumn('cards');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_features', function (Blueprint $table) {
            // Recria o campo 'cards'
            $table->json('cards')->after('subtitle');

            // Remove os novos campos
            $table->dropColumn('card_title1');
            $table->dropColumn('card_description1');
            $table->dropColumn('card_icon1');

            $table->dropColumn('card_title2');
            $table->dropColumn('card_description2');
            $table->dropColumn('card_icon2');

            $table->dropColumn('card_title3');
            $table->dropColumn('card_description3');
            $table->dropColumn('card_icon3');
        });
    }
};
