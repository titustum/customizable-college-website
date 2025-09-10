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
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // e.g. "ICT Lecturer"
            $table->text('description')->nullable(); // Full job description
            $table->string('reference_number')->unique(); // e.g. TTVCT/HR/2025/002
            $table->foreignId('department_id')->constrained()->onDelete('cascade');
            $table->date('published_at')->nullable();
            $table->date('application_deadline');
            $table->string('attachment_path')->nullable(); // Link to job PDF
            $table->enum('status', ['open', 'closed', 'cancelled'])->default('open');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacancies');
    }
};
