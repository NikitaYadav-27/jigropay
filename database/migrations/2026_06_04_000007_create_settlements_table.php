<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settlements', function (Blueprint $table) {
            $table->id();

            // Who initiated the settlement (admin/SD/distributor)
            $table->foreignId('initiated_by')->constrained('users');
            // The recipient merchant/partner
            $table->foreignId('recipient_id')->constrained('users');

            $table->decimal('amount', 15, 2);
            $table->decimal('fee', 10, 2)->default(0.00);
            $table->decimal('net_amount', 15, 2);

            $table->enum('method', ['imps', 'neft', 'rtgs'])->default('imps');
            $table->enum('status', ['pending', 'success', 'failed'])->default('pending');

            // Bank details snapshot
            $table->string('account_holder')->nullable();
            $table->string('account_number')->nullable();
            $table->string('ifsc', 20)->nullable();
            $table->string('bank_name')->nullable();

            $table->string('remarks')->nullable();
            $table->timestamps();

            $table->index(['recipient_id', 'status', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settlements');
    }
};
