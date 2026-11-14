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
        Schema::create('services_contents', function (Blueprint $table) {
            $table->id();

            // Page Hero
            $table->string('hero_eyebrow')->default('Services');
            $table->string('hero_title')->default('Four service areas, <em>one trusted contact</em>');
            $table->text('hero_lead')->default('Everything Stonemere does falls into four areas. Each can be arranged on its own, and all of them are coordinated by the same named person.');
            $table->string('hero_cta_primary_text')->default('Ask which fits');
            $table->string('hero_cta_primary_url')->default('https://wa.me/447891341414?text=Hello%20Stonemere%2C%20I%20would%20like%20to%20ask%20which%20of%20your%20services%20would%20fit%20a%20client.');
            $table->string('hero_cta_secondary_text')->default('Price menu');
            $table->string('hero_cta_secondary_url')->default('/price-menu');

            // CTA Band
            $table->string('cta_eyebrow')->default('Next step');
            $table->string('cta_title')->default('Tell us what is happening');
            $table->text('cta_text')->default('One conversation is enough to know whether we can help.');
            $table->string('cta_button_primary_text')->default('Message on WhatsApp');
            $table->string('cta_button_primary_url')->default('https://wa.me/447891341414?text=Hello%20Stonemere%2C%20I%20would%20like%20to%20talk%20about%20some%20support.');
            $table->string('cta_button_secondary_text')->default('Call 01225 338436');
            $table->string('cta_button_secondary_url')->default('tel:+441225338436');

            // SEO & Social
            $table->string('meta_title')->nullable()->default('Services | Life Management in Bath | Stonemere');
            $table->text('meta_description')->nullable()->default("Discover Stonemere's practical coordination services: family support, care liaison, property management and urgent cases in Bath.");
            $table->text('meta_keywords')->nullable();
            $table->string('og_title')->nullable();
            $table->text('og_description')->nullable();
            $table->string('og_image')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services_contents');
    }
};
