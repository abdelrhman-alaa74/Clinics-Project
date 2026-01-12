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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique()->nullable();
            $table->uuid('gateway_uuid')->nullable()->unique();
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete();
            $table->morphs('model');
            $table->json('model_json')->nullable();
            $table->string('status')->default('pending')->nullable();
            $table->string('coupon')->nullable();
            $table->decimal('amount', 8,2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
