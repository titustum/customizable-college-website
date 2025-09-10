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
        Schema::create('past_papers', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // e.g. "ICT Principles CAT 1"
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->string('unit_name'); // Optional: unit or subject
            $table->enum('exam_type', ['cat', 'midterm', 'final'])->default('final');
            $table->year('exam_year');
            $table->string('term')->nullable(); // e.g. "Term 1", or "Semester 2"
            $table->string('file_path'); // PDF file
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('past_papers');
    }
};
