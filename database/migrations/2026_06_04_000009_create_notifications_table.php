<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();

            // Sender (null = system)
            $table->foreignId('sent_by')->nullable()->constrained('users')->nullOnDelete();

            $table->string('title');
            $table->text('message');

            // announcement, transaction, critical
            $table->string('type')->default('announcement');

            // Target audience: all, admin, super-distributor, distributor, retailer, or a specific user
            $table->string('audience')->default('all');
            $table->foreignId('target_user_id')->nullable()->constrained('users')->nullOnDelete();

            $table->boolean('is_draft')->default(false);
            $table->timestamp('sent_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
