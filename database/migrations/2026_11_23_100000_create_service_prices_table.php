<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('service_prices', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('description')->nullable();
            $table->string('price_text');
            $table->string('price_type')->default('custom');
            $table->decimal('price_amount', 10, 2)->nullable();
            $table->decimal('price_max', 10, 2)->nullable();
            $table->decimal('minimum_amount', 10, 2)->nullable();
            $table->string('price_unit')->nullable();
            $table->text('additional_info')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->boolean('show_on_website')->default(true);
            $table->timestamps();
        });

        $services = [
            ['Initial telephone consultation', 'initial-telephone-consultation', 'Up to 30 minutes – FREE', 'free', null, null, null, '30 minutes', null],
            ['Home visits & welfare checks', 'home-visits-welfare-checks', 'From £110 per hour', 'hourly', 110, null, null, 'per hour', 'From'],
            ['Professional / family representation & case management', 'professional-family-representation', '£125–£150 per hour', 'hourly', 125, 150, null, 'per hour', null],
            ['Hospital, solicitor & professional attendance', 'hospital-solicitor-attendance', '£150 per hour', 'hourly', 150, null, null, 'per hour', null],
            ['Office administration & support', 'office-administration-support', '£45 first 18 minutes; then £15 per 6 minutes', 'custom', 45, null, null, null, null],
            ['Property oversight', 'property-oversight', 'From £125 per visit', 'from', 125, null, null, 'per visit', 'From'],
            ['Detailed property inspection / reporting', 'property-inspection-reporting', 'From £175', 'from', 175, null, null, null, 'From'],
            ['Downsizing & move management', 'downsizing-move-management', 'From £110 per hour', 'hourly', 110, null, null, 'per hour', 'From'],
            ['Removal / transport service – van + driver', 'removal-transport-service', 'From £65 per hour', 'hourly', 65, null, null, 'per hour', 'From'],
            ['House clearance', 'house-clearance', 'From £65 per hour + disposal costs', 'hourly', 65, null, null, 'per hour', 'From'],
            ['Lifestyle & business management', 'lifestyle-business-management', 'From £50 per hour', 'hourly', 50, null, null, 'per hour', 'From'],
            ['Urgent same-day support', 'urgent-same-day-support', '£195 per hour', 'hourly', 195, null, null, 'per hour', null],
            ['Out-of-hours support', 'out-of-hours-support', '£225 per hour', 'hourly', 225, null, null, 'per hour', null],
            ['Tradespeople & contractor coordination', 'tradespeople-contractor-coordination', '15% of third-party cost (minimum £30)', 'percentage', null, null, 30, null, null],
            ['Procurement & specialist purchasing', 'procurement-specialist-purchasing', '15% of purchase cost (minimum £25)', 'percentage', null, null, 25, null, null],
        ];

        foreach ($services as $i => $s) {
            DB::table('service_prices')->insert([
                'name' => $s[0],
                'slug' => $s[1],
                'description' => null,
                'price_text' => $s[2],
                'price_type' => $s[3],
                'price_amount' => $s[4],
                'price_max' => $s[5],
                'minimum_amount' => $s[6],
                'price_unit' => $s[7],
                'additional_info' => $s[8],
                'sort_order' => $i + 1,
                'is_active' => true,
                'show_on_website' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('service_prices');
    }
};
