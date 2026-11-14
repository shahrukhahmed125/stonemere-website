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
        Schema::create('pricing_items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->enum('type', ['membership', 'separate'])->default('separate');
            $table->foreignId('membership_level_id')->nullable()->constrained('membership_levels')->onDelete('set null');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
            
            $table->index('type');
            $table->index('membership_level_id');
            $table->index('sort_order');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pricing_items');
    }
};
