<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('professionals_contents', function (Blueprint $table) {
            $table->id();
            $table->string('hero_eyebrow')->nullable();
            $table->string('hero_title')->nullable();
            $table->text('hero_lead')->nullable();
            $table->string('hero_cta_primary_text')->nullable();
            $table->string('hero_cta_primary_url')->nullable();
            $table->string('hero_cta_secondary_text')->nullable();
            $table->string('hero_cta_secondary_url')->nullable();
            $table->string('remit_eyebrow')->nullable();
            $table->string('remit_title')->nullable();
            $table->text('remit_lede')->nullable();
            $table->text('remit_body')->nullable();
            $table->string('builder_eyebrow')->nullable();
            $table->string('builder_title')->nullable();
            $table->text('builder_intro')->nullable();
            $table->string('faqs_eyebrow')->nullable();
            $table->string('faqs_title')->nullable();
            $table->string('cta_eyebrow')->nullable();
            $table->string('cta_title')->nullable();
            $table->text('cta_text')->nullable();
            $table->string('cta_button_primary_text')->nullable();
            $table->string('cta_button_primary_url')->nullable();
            $table->string('cta_button_secondary_text')->nullable();
            $table->string('cta_button_secondary_url')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->string('og_title')->nullable();
            $table->text('og_description')->nullable();
            $table->string('og_image')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('professionals_contents');
    }
};
