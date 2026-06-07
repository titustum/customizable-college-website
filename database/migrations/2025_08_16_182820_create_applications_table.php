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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('institution_id')->constrained()->cascadeOnDelete();
            $table->string('full_name');
            $table->string('phone');
            $table->string('alternative_phone')->nullable();
            $table->enum('gender', ['male', 'female', 'other']);
            $table->string('id_number')->unique();
            $table->foreignId('course_id')->constrained('courses');
            $table->string('start_term');
            $table->string('high_school');
            $table->string('high_school_grade');
            $table->string('kcse_index_number');
            $table->year('kcse_year');
            $table->string('nemis_upi_number')->nullable();
            $table->string('parent_name');
            $table->string('parent_phone');
            $table->timestamps();
            $table->index('course_id');
            $table->index('kcse_year');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
