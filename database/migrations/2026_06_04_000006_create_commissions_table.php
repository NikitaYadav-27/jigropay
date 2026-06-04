<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Actual commission credits per transaction per user in the chain
        Schema::create('commissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaction_id')->constrained('transactions');
            $table->foreignId('user_id')->constrained('users');         // who received this commission
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('slab_id')->nullable()->constrained('commission_slabs')->nullOnDelete();

            $table->decimal('transaction_volume', 15, 2);
            $table->decimal('commission_amount', 10, 2);

            $table->enum('status', ['pending', 'credited', 'reversed'])->default('pending');
            $table->timestamps();

            $table->index(['user_id', 'status', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commissions');
    }
};
