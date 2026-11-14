<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $cols = [
            'about_contents' => ['isnot_columns', 'principles_items'],
            'team_contents' => ['howteam_items'],
            'professionals_contents' => ['builder_referrer_options', 'builder_needs_groups', 'builder_urgency_options', 'builder_area_options', 'faqs_items'],
            'price_menu_contents' => ['account_steps', 'faqs_items'],
            'contact_contents' => ['form_role_options'],
            'privacy_contents' => ['sections'],
            'terms_contents' => ['sections'],
            'homepage_contents' => ['statement_paragraphs', 'keystone_captions', 'track_cards', 'refer_cards', 'steps_items', 'standards_items', 'where_figures'],
        ];

        foreach ($cols as $table => $columns) {
            Schema::table($table, function (Blueprint $t) use ($columns) {
                foreach ($columns as $c) {
                    $t->json($c)->nullable();
                }
            });
        }
    }

    public function down(): void
    {
        $cols = [
            'about_contents' => ['isnot_columns', 'principles_items'],
            'team_contents' => ['howteam_items'],
            'professionals_contents' => ['builder_referrer_options', 'builder_needs_groups', 'builder_urgency_options', 'builder_area_options', 'faqs_items'],
            'price_menu_contents' => ['account_steps', 'faqs_items'],
            'contact_contents' => ['form_role_options'],
            'privacy_contents' => ['sections'],
            'terms_contents' => ['sections'],
            'homepage_contents' => ['statement_paragraphs', 'keystone_captions', 'track_cards', 'refer_cards', 'steps_items', 'standards_items', 'where_figures'],
        ];

        foreach ($cols as $table => $columns) {
            Schema::table($table, function (Blueprint $t) use ($columns) {
                $t->dropColumn($columns);
            });
        }
    }
};
