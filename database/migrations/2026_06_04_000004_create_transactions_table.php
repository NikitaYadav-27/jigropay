<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('txn_id')->unique();           // internal ref e.g. TXN_98234712
            $table->string('bconnect_txn_id')->nullable(); // operator ref e.g. BBC-1029384756
            $table->string('operator_ref_id')->nullable(); // BBPS ref

            $table->foreignId('user_id')->constrained('users');           // retailer who did the txn
            $table->foreignId('category_id')->constrained('categories');

            $table->decimal('amount', 15, 2);
            $table->decimal('ccf', 10, 2)->default(0.00);       // customer convenience fee
            $table->decimal('commission_earned', 10, 2)->default(0.00);
            $table->decimal('total_settled', 15, 2)->default(0.00);

            $table->string('consumer_number')->nullable(); // bill/consumer no
            $table->string('payment_method')->default('wallet'); // wallet, upi etc.
            $table->string('ip_address', 45)->nullable();

            $table->enum('status', ['success', 'pending', 'failed'])->default('pending');

            $table->timestamps();

            $table->index(['user_id', 'status', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
