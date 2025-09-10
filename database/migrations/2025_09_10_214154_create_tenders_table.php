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
        Schema::create('tenders', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // e.g. "Supply of ICT Equipment"
            $table->text('description')->nullable(); // Tender details
            $table->string('reference_number')->unique(); // e.g. TTVCT/ICT/2025/001
            $table->date('opening_date')->nullable(); // When it becomes active
            $table->date('closing_date'); // Deadline
            $table->string('attachment_path')->nullable(); // PDF/Document link
            $table->enum('status', ['open', 'closed', 'cancelled'])->default('open');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenders');
    }
};
