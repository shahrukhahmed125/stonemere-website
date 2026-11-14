<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        foreach (['privacy_contents', 'terms_contents'] as $table) {
            Schema::table($table, function (Blueprint $t) {
                $t->string('hero_title')->nullable()->after('id');
                $t->string('last_updated')->nullable()->after('hero_title');
                $t->longText('content')->nullable()->after('last_updated');
            });

            DB::table($table)->orderBy('id')->each(function ($row) use ($table) {
                $sections = json_decode($row->sections ?? '[]', true) ?: [];
                $html = '';
                foreach ($sections as $section) {
                    $id = $section['id'] ?? '';
                    $heading = $section['heading'] ?? '';
                    $body = $section['html'] ?? '';
                    $html .= '<h2 id="' . e($id) . '">' . e($heading) . '</h2>' . $body;
                }

                DB::table($table)->where('id', $row->id)->update([
                    'hero_title' => $row->doc_title,
                    'last_updated' => $row->doc_date,
                    'content' => $html,
                ]);
            });

            Schema::table($table, function (Blueprint $t) {
                $t->dropColumn(['doc_title', 'doc_date', 'sections']);
            });
        }
    }

    public function down(): void
    {
        foreach (['privacy_contents', 'terms_contents'] as $table) {
            Schema::table($table, function (Blueprint $t) {
                $t->string('doc_title')->nullable();
                $t->string('doc_date')->nullable();
                $t->json('sections')->nullable();
            });

            DB::table($table)->orderBy('id')->each(function ($row) use ($table) {
                preg_match_all('/<h2 id="([^"]*)">(.*?)<\/h2>(.*?)(?=<h2|$)/s', $row->content ?? '', $m, PREG_SET_ORDER);
                $sections = [];
                foreach ($m as $match) {
                    $sections[] = [
                        'id' => $match[1],
                        'heading' => trim(strip_tags($match[2])),
                        'html' => trim($match[3]),
                    ];
                }

                DB::table($table)->where('id', $row->id)->update([
                    'doc_title' => $row->hero_title,
                    'doc_date' => $row->last_updated,
                    'sections' => json_encode($sections),
                ]);
            });

            Schema::table($table, function (Blueprint $t) {
                $t->dropColumn(['hero_title', 'last_updated', 'content']);
            });
        }
    }
};
