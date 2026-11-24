<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('homepage_contents', function (Blueprint $table) {
            $table->json('tiers_benefits')->nullable()->after('tiers_description');
        });

        $benefits = [
            ['title' => 'Free Initial Consultation', 'text' => 'Up to 30 minutes by telephone.'],
            ['title' => 'Flexible Support', 'text' => 'No fixed ongoing package is required.'],
            ['title' => 'Transparent Pricing', 'text' => 'Service costs, estimated time and additional expenses agreed in advance wherever reasonably possible.'],
        ];

        DB::table('homepage_contents')->whereNull('tiers_benefits')->update([
            'tiers_benefits' => json_encode($benefits),
        ]);
    }

    public function down(): void
    {
        Schema::table('homepage_contents', function (Blueprint $table) {
            $table->dropColumn('tiers_benefits');
        });
    }
};
