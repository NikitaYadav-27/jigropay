<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Role: admin, super-distributor, distributor, retailer
            $table->enum('role', ['admin', 'super-distributor', 'distributor', 'retailer'])
                  ->default('retailer')->after('phone');

            // Hierarchy: self-referencing parent
            $table->foreignId('parent_id')->nullable()->constrained('users')->nullOnDelete()->after('role');

            // Identity & address
            $table->string('pan_number', 10)->nullable()->after('parent_id');
            $table->string('street_address')->nullable()->after('pan_number');
            $table->string('city', 100)->nullable()->after('street_address');
            $table->string('state', 100)->nullable()->after('city');
            $table->string('pincode', 6)->nullable()->after('state');

            // Wallet & commission
            $table->decimal('wallet_balance', 15, 2)->default(0.00)->after('pincode');
            $table->decimal('wallet_limit', 15, 2)->default(0.00)->after('wallet_balance');

            // Status: active, pending, suspended
            $table->enum('status', ['active', 'pending', 'suspended'])->default('pending')->after('wallet_limit');

            // Soft deletes
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['parent_id']);
            $table->dropColumn([
                'role', 'parent_id', 'pan_number',
                'street_address', 'city', 'state', 'pincode',
                'wallet_balance', 'wallet_limit', 'status', 'deleted_at',
            ]);
        });
    }
};
