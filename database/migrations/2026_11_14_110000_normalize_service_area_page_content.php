<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('service_areas', function (Blueprint $table) {
            $table->text('hero_lead')->nullable()->after('short_description');
        });

        Schema::create('service_area_faq_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_area_id')->constrained()->onDelete('cascade');
            $table->string('question');
            $table->text('answer');
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            $table->index(['service_area_id', 'sort_order']);
        });

        Schema::create('service_area_call_flow_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_area_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('description')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            $table->index(['service_area_id', 'sort_order']);
        });

        // Migrate existing page_content JSON into the new structure
        foreach (DB::table('service_areas')->get() as $area) {
            $content = json_decode($area->page_content ?? 'null', true);
            if (!is_array($content)) {
                continue;
            }

            if (!empty($content['lead'])) {
                DB::table('service_areas')->where('id', $area->id)->update(['hero_lead' => $content['lead']]);
            }

            foreach (($content['faqs'] ?? []) as $i => $faq) {
                if (empty($faq['question'])) {
                    continue;
                }
                DB::table('service_area_faq_items')->insert([
                    'service_area_id' => $area->id,
                    'question' => $faq['question'],
                    'answer' => $faq['answer'] ?? '',
                    'sort_order' => $i,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            foreach (($content['callflow'] ?? []) as $i => $step) {
                if (empty($step['title'])) {
                    continue;
                }
                DB::table('service_area_call_flow_items')->insert([
                    'service_area_id' => $area->id,
                    'title' => $step['title'],
                    'description' => $step['description'] ?? null,
                    'sort_order' => $i,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        Schema::table('service_areas', function (Blueprint $table) {
            $table->dropColumn('page_content');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('service_areas', function (Blueprint $table) {
            $table->json('page_content')->nullable();
            $table->dropColumn('hero_lead');
        });

        Schema::dropIfExists('service_area_faq_items');
        Schema::dropIfExists('service_area_call_flow_items');
    }
};
