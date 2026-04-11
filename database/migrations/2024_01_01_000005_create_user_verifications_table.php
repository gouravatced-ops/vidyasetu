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
        Schema::create('user_verifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->enum('type', ['email', 'phone']); // Type of verification
            $table->string('token'); // Verification token
            $table->string('code')->nullable(); // OTP code for phone verification
            $table->timestamp('expires_at')->nullable(); // Token/code expiration
            $table->boolean('is_used')->default(false); // Whether token/code has been used
            $table->timestamp('used_at')->nullable(); // When it was used
            $table->timestamps();

            $table->index(['user_id', 'type']);
            $table->index(['token']);
            $table->index(['expires_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_verifications');
    }
};