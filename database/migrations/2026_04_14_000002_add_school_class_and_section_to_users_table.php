<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('school_class_id')->nullable()->constrained('school_classes')->nullOnDelete()->after('school_id');
            $table->foreignId('section_id')->nullable()->constrained('sections')->nullOnDelete()->after('school_class_id');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['section_id']);
            $table->dropForeign(['school_class_id']);
            $table->dropColumn(['school_class_id', 'section_id']);
        });
    }
};
