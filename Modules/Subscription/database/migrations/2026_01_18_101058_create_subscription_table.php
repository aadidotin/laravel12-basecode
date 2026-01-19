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
        // 1. Subscription Plans
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->decimal('monthly_price', 10, 2)->default(0.00);
            $table->string('currency', 3)->default('INR');
            $table->decimal('yearly_discount', 3, 2)->default(0.00)->comment('Discount amount for yearly subscriptions');
            $table->integer('trial_period_days')->default(30);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // 2. Available Features (The master list of what your SaaS can do)
        Schema::create('features', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // e.g., "Max Users"
            $table->string('code')->unique(); // e.g., "max_users"
            $table->enum('type', ['limit', 'feature'])->default('feature');
            $table->timestamps();
        });

        // 3. Plan Features (Pivot: Linking Plans to Limits)
        Schema::create('plan_features', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subscription_id')->constrained('subscriptions')->cascadeOnDelete();
            $table->foreignId('feature_id')->constrained('features')->cascadeOnDelete();
            $table->string('value')->nullable();
            $table->timestamps();

            // Prevent duplicate features for the same plan
            $table->unique(['subscription_id', 'feature_id']);
        });

        // 4. Active Subscriptions
        Schema::create('active_subscriptions', function (Blueprint $table) {
            $table->id();

            // References the string ID from the tenants table
            $table->string('tenant_id');
            $table->foreign('tenant_id')->references('id')->on('tenants')->cascadeOnDelete();

            $table->foreignId('subscription_id')->constrained('subscriptions');

            $table->string('status')->default('active'); // active, cancelled, past_due
            $table->timestamp('starts_at')->useCurrent();
            $table->timestamp('ends_at')->nullable();
            $table->timestamp('trial_ends_at')->nullable(); // Nullable (for lifetime) or set for recurring.
            $table->timestamp('cancelled_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
        Schema::dropIfExists('features');
        Schema::dropIfExists('plan_features');
        Schema::dropIfExists('active_subscriptions');
    }
};
