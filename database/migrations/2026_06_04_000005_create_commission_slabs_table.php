<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Each user (admin/SD/distributor) defines slabs for their direct downline role
        // per service category
        Schema::create('commission_slabs', function (Blueprint $table) {
            $table->id();

            // The user who owns/sets this slab (admin sets for SD, SD sets for distributor, etc.)
            $table->foreignId('user_id')->constrained('users');

            $table->foreignId('category_id')->constrained('categories');

            // flat or percent
            $table->enum('rate_type', ['percent', 'flat'])->default('percent');
            $table->decimal('rate', 10, 4);          // percentage or flat amount
            $table->decimal('min_amount', 10, 2)->default(0.00);
            $table->decimal('max_amount', 10, 2)->default(0.00);

            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->unique(['user_id', 'category_id'], 'slab_user_category_unique');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commission_slabs');
    }
};
