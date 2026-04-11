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
        Schema::create('otp_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->enum('type', ['email', 'sms']); // Type of OTP delivery
            $table->string('recipient'); // Email or phone number
            $table->string('otp_code', 10); // The OTP code sent
            $table->enum('purpose', ['verification', 'password_reset', 'login', 'registration']); // Purpose of OTP
            $table->boolean('is_used')->default(false);
            $table->timestamp('used_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->integer('attempts')->default(0); // Number of verification attempts
            $table->boolean('successful')->default(false);
            $table->string('failure_reason')->nullable();
            $table->json('metadata')->nullable(); // Additional data like provider response
            $table->timestamps();

            $table->index(['recipient', 'otp_code']);
            $table->index(['user_id', 'purpose']);
            $table->index(['expires_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('otp_logs');
    }
};