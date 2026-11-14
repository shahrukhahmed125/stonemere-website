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
        Schema::create('vacant_property_check_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_area_id')->nullable()->constrained('service_areas')->onDelete('cascade');
            $table->string('item_text');
            $table->boolean('is_default_checked')->default(false);
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            $table->index('service_area_id');
            $table->index('sort_order');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacant_property_check_items');
    }
};
