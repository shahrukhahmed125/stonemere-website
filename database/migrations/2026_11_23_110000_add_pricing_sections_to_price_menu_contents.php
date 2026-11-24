<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('price_menu_contents', function (Blueprint $table) {
            $table->string('intro_eyebrow')->nullable()->after('hero_cta_secondary_url');
            $table->string('intro_title')->nullable()->after('intro_eyebrow');
            $table->text('intro_text')->nullable()->after('intro_title');
            $table->string('table_eyebrow')->nullable()->after('intro_text');
            $table->string('table_title')->nullable()->after('table_eyebrow');
            $table->string('charges_eyebrow')->nullable()->after('table_title');
            $table->string('charges_title')->nullable()->after('charges_eyebrow');
            $table->json('charge_items')->nullable()->after('charges_title');
            $table->string('agreement_eyebrow')->nullable()->after('charge_items');
            $table->string('agreement_title')->nullable()->after('agreement_eyebrow');
            $table->text('agreement_text')->nullable()->after('agreement_title');
        });
    }

    public function down(): void
    {
        Schema::table('price_menu_contents', function (Blueprint $table) {
            $table->dropColumn([
                'intro_eyebrow', 'intro_title', 'intro_text',
                'table_eyebrow', 'table_title',
                'charges_eyebrow', 'charges_title', 'charge_items',
                'agreement_eyebrow', 'agreement_title', 'agreement_text',
            ]);
        });
    }
};
