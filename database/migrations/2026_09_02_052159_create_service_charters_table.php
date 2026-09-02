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
        Schema::create('service_charters', function (Blueprint $table) {
            $table->id();
            $table->string('title_en'); // English heading e.g. "Service Charter"
            $table->string('title_sw'); // Kiswahili heading e.g. "Mkataba wa Huduma"
            $table->text('description_en'); // English commitment paragraph
            $table->text('description_sw'); // Kiswahili commitment paragraph
            $table->json('commitments_en'); // List of English commitments/points
            $table->json('commitments_sw'); // List of Kiswahili commitments/points
            $table->string('image_en')->nullable(); // English version chart/pic
            $table->string('image_sw')->nullable(); // Kiswahili version chart/pic
            $table->string('audio_en')->nullable(); // English audio narration
            $table->string('audio_sw')->nullable(); // Kiswahili audio narration
            $table->string('pdf_en')->nullable(); // Downloadable English charter PDF
            $table->string('pdf_sw')->nullable(); // Downloadable Kiswahili charter PDF
            $table->boolean('is_published')->default(true); // Hide or show on the site
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_charters');
    }
};
