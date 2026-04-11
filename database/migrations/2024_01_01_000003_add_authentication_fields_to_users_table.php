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
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->nullable()->after('email');
            $table->timestamp('phone_verified_at')->nullable()->after('phone');
            $table->foreignId('role_id')->constrained('roles')->onDelete('cascade')->after('phone_verified_at');
            $table->string('avatar')->nullable()->after('role_id');
            $table->boolean('is_active')->default(true)->after('avatar');
            $table->timestamp('last_login_at')->nullable()->after('is_active');
            $table->string('last_login_ip')->nullable()->after('last_login_at');
            $table->json('preferences')->nullable()->after('last_login_ip');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
            $table->dropColumn([
                'phone',
                'phone_verified_at',
                'role_id',
                'avatar',
                'is_active',
                'last_login_at',
                'last_login_ip',
                'preferences',
            ]);
            $table->dropSoftDeletes();
        });
    }
};