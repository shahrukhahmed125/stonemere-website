<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('service_areas', function (Blueprint $table) {
            $table->string('hero_cta_primary_text')->nullable()->after('hero_image');
            $table->string('hero_cta_primary_url', 1000)->nullable()->after('hero_cta_primary_text');
            $table->string('hero_cta_secondary_text')->nullable()->after('hero_cta_primary_url');
            $table->string('hero_cta_secondary_url', 1000)->nullable()->after('hero_cta_secondary_text');

            $table->string('services_eyebrow')->nullable();
            $table->string('services_heading')->nullable();
            $table->text('services_intro')->nullable();

            $table->string('scenarios_eyebrow')->nullable();
            $table->string('scenarios_heading')->nullable();

            $table->string('faqs_eyebrow')->nullable();
            $table->string('faqs_heading')->nullable();

            $table->string('timeline_eyebrow')->nullable();
            $table->string('timeline_heading')->nullable();

            $table->string('checks_eyebrow')->nullable();
            $table->string('checks_heading')->nullable();
            $table->text('checks_intro')->nullable();

            $table->string('callflow_eyebrow')->nullable();
            $table->string('callflow_heading')->nullable();
            $table->text('callflow_note')->nullable();

            $table->string('cta_eyebrow')->nullable();
            $table->string('cta_heading')->nullable();
            $table->text('cta_text')->nullable();
            $table->string('cta_primary_text')->nullable();
            $table->string('cta_primary_url', 1000)->nullable();
            $table->string('cta_secondary_text')->nullable();
            $table->string('cta_secondary_url', 1000)->nullable();
        });

        Schema::table('service_scenarios', function (Blueprint $table) {
            $table->string('image')->nullable()->after('description');
        });

        $shared = [
            'services_eyebrow' => 'What this covers',
            'services_heading' => '{count} services, <em>one contact</em>',
            'services_intro' => 'Each one can be arranged on its own or as part of ongoing support.',
            'scenarios_eyebrow' => 'Typical situations',
            'scenarios_heading' => 'When people <em>call us</em>',
            'faqs_eyebrow' => 'Questions',
            'faqs_heading' => 'Good to <em>know</em>',
            'cta_eyebrow' => 'Next step',
            'cta_heading' => 'Talk to us about this area',
            'cta_text' => 'Tell us what is needed. We will confirm what we can take on and what it involves before anything starts.',
            'cta_primary_text' => 'Message on WhatsApp',
            'cta_secondary_text' => 'Call 01225 338436',
            'cta_secondary_url' => 'tel:+441225338436',
        ];

        $perSlug = [
            'family-client-support' => [
                'hero_cta_primary_url' => 'https://wa.me/447891341414?text=Hello%20Stonemere%2C%20I%20would%20like%20to%20ask%20about%20Family%20%26%20Client%20Support.',
                'hero_cta_primary_text' => 'Ask about this area',
                'hero_cta_secondary_text' => 'Call 01225 338436',
                'hero_cta_secondary_url' => 'tel:+441225338436',
                'cta_primary_url' => 'https://wa.me/447891341414?text=Hello%20Stonemere%2C%20I%20would%20like%20to%20ask%20about%20Family%20%26%20Client%20Support.',
            ],
            'care-professional-liaison' => [
                'hero_cta_primary_url' => 'https://wa.me/447891341414?text=Hello%20Stonemere%2C%20I%20would%20like%20to%20ask%20about%20Care%20%26%20Professional%20Liaison.',
                'hero_cta_primary_text' => 'Ask about this area',
                'hero_cta_secondary_text' => 'Call 01225 338436',
                'hero_cta_secondary_url' => 'tel:+441225338436',
                'timeline_eyebrow' => 'Hospital discharge',
                'timeline_heading' => 'Coming home, <em>properly prepared</em>',
                'cta_primary_url' => 'https://wa.me/447891341414?text=Hello%20Stonemere%2C%20I%20would%20like%20to%20ask%20about%20Care%20%26%20Professional%20Liaison.',
            ],
            'property-asset-management' => [
                'hero_cta_primary_url' => 'https://wa.me/447891341414?text=Hello%20Stonemere%2C%20I%20would%20like%20to%20ask%20about%20Property%20%26%20Asset%20Management.',
                'hero_cta_primary_text' => 'Ask about this area',
                'hero_cta_secondary_text' => 'Call 01225 338436',
                'hero_cta_secondary_url' => 'tel:+441225338436',
                'checks_eyebrow' => 'Vacant property checks',
                'checks_heading' => 'What a visit can <em>cover</em>',
                'checks_intro' => 'You agree the scope and frequency with us. Typical items are below; select the ones you need and send them to us.',
                'cta_primary_url' => 'https://wa.me/447891341414?text=Hello%20Stonemere%2C%20I%20would%20like%20to%20ask%20about%20Property%20%26%20Asset%20Management.',
            ],
            'urgent-complex-cases' => [
                'hero_cta_primary_url' => 'https://wa.me/447891341414?text=Hello%20Stonemere%2C%20I%20would%20like%20to%20ask%20about%20Urgent%20%26%20Complex%20Case%20Support.',
                'hero_cta_primary_text' => 'Ask about this area',
                'hero_cta_secondary_text' => 'Call 01225 338436',
                'hero_cta_secondary_url' => 'tel:+441225338436',
                'callflow_eyebrow' => 'When it is urgent',
                'callflow_heading' => 'What happens <em>when you call</em>',
                'callflow_note' => 'If someone is in immediate danger, call 999 first.',
                'cta_primary_url' => 'https://wa.me/447891341414?text=Hello%20Stonemere%2C%20I%20would%20like%20to%20ask%20about%20Urgent%20%26%20Complex%20Case%20Support.',
            ],
        ];

        foreach (DB::table('service_areas')->get() as $area) {
            $data = array_merge($shared, $perSlug[$area->slug] ?? []);
            DB::table('service_areas')->where('id', $area->id)->update($data);
        }
    }

    public function down(): void
    {
        Schema::table('service_scenarios', function (Blueprint $table) {
            $table->dropColumn('image');
        });

        Schema::table('service_areas', function (Blueprint $table) {
            $table->dropColumn([
                'hero_cta_primary_text', 'hero_cta_primary_url', 'hero_cta_secondary_text', 'hero_cta_secondary_url',
                'services_eyebrow', 'services_heading', 'services_intro',
                'scenarios_eyebrow', 'scenarios_heading',
                'faqs_eyebrow', 'faqs_heading',
                'timeline_eyebrow', 'timeline_heading',
                'checks_eyebrow', 'checks_heading', 'checks_intro',
                'callflow_eyebrow', 'callflow_heading', 'callflow_note',
                'cta_eyebrow', 'cta_heading', 'cta_text',
                'cta_primary_text', 'cta_primary_url', 'cta_secondary_text', 'cta_secondary_url',
            ]);
        });
    }
};
