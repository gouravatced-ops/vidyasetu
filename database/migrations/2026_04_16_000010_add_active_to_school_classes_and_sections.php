<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('school_classes', function (Blueprint $table) {
            $table->boolean('is_active')->default(true)->after('description');
        });

        Schema::table('sections', function (Blueprint $table) {
            $table->boolean('is_active')->default(true)->after('display_name');
        });
    }

    public function down(): void
    {
        Schema::table('sections', function (Blueprint $table) {
            $table->dropColumn('is_active');
        });

        Schema::table('school_classes', function (Blueprint $table) {
            $table->dropColumn('is_active');
        });
    }
};
