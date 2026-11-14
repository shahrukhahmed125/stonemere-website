<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('homepage_contents', function (Blueprint $table) {
            $table->id();
            $table->string('hero_title')->nullable();
            $table->text('hero_lead')->nullable();
            $table->string('hero_cta_primary_text')->nullable();
            $table->string('hero_cta_primary_url')->nullable();
            $table->string('hero_cta_secondary_text')->nullable();
            $table->string('hero_cta_secondary_url')->nullable();
            $table->text('strap_text')->nullable();
            $table->string('statement_eyebrow')->nullable();
            $table->string('statement_title')->nullable();
            $table->string('statement_link_text')->nullable();
            $table->string('statement_link_url')->nullable();
            $table->string('keystone_eyebrow')->nullable();
            $table->string('keystone_title')->nullable();
            $table->string('track_eyebrow')->nullable();
            $table->string('track_title')->nullable();
            $table->text('track_description')->nullable();
            $table->string('track_link_text')->nullable();
            $table->string('track_link_url')->nullable();
            $table->string('refer_eyebrow')->nullable();
            $table->string('refer_title')->nullable();
            $table->string('mapper_eyebrow')->nullable();
            $table->string('mapper_title')->nullable();
            $table->text('mapper_description')->nullable();
            $table->string('mapper_count_text')->nullable();
            $table->string('mapper_cta_text')->nullable();
            $table->string('mapper_cta_url')->nullable();
            $table->string('steps_eyebrow')->nullable();
            $table->string('steps_title')->nullable();
            $table->text('steps_description')->nullable();
            $table->string('steps_button_text')->nullable();
            $table->string('steps_button_url')->nullable();
            $table->string('bounds_do_label')->nullable();
            $table->text('bounds_do_big_text')->nullable();
            $table->text('bounds_do_description')->nullable();
            $table->string('bounds_dont_label')->nullable();
            $table->text('bounds_dont_big_text')->nullable();
            $table->text('bounds_dont_description')->nullable();
            $table->string('standards_title')->nullable();
            $table->string('where_eyebrow')->nullable();
            $table->string('where_title')->nullable();
            $table->text('where_description')->nullable();
            $table->string('lead_eyebrow')->nullable();
            $table->string('lead_title')->nullable();
            $table->text('lead_description')->nullable();
            $table->string('lead_button_primary_text')->nullable();
            $table->string('lead_button_primary_url')->nullable();
            $table->string('lead_button_secondary_text')->nullable();
            $table->string('lead_button_secondary_url')->nullable();
            $table->string('tiers_eyebrow')->nullable();
            $table->string('tiers_title')->nullable();
            $table->text('tiers_description')->nullable();
            $table->string('tiers_link_text')->nullable();
            $table->string('tiers_link_url')->nullable();
            $table->string('questions_eyebrow')->nullable();
            $table->string('questions_title')->nullable();
            $table->text('questions_description')->nullable();
            $table->string('contact_eyebrow')->nullable();
            $table->string('contact_title')->nullable();
            $table->text('contact_description')->nullable();
            $table->string('contact_office_bath_label')->nullable();
            $table->string('contact_office_bath_note')->nullable();
            $table->string('contact_office_bath_phone')->nullable();
            $table->string('contact_office_whatsapp_label')->nullable();
            $table->string('contact_office_whatsapp_phone')->nullable();
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
        Schema::dropIfExists('homepage_contents');
    }
};
