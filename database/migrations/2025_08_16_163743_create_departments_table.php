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
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // name of the department e.g. Cosmetology, ICT, Agriculture etc.
            $table->string('slug')->unique(); // e.g. cosmetology, ict, agriculture etc.
            $table->string('photo')->nullable(); // captivating pic of students of departments doing somethin; will be displayed on landing page.
            $table->string('short_description')->nullable(); // short captivating desc that will be loaded in landing page e.g. Master the art and science of Beauty Therapy and Hairdressing with our amazing programs.
            $table->text('full_description')->nullable(); // The description that will be displayed on single page when user selects to view that department
            $table->string('banner_photo')->nullable(); // Banner pic that will be displayed on single page when user selects to view that department
            $table->string('type')->default('academic'); // academic (e.g. Cosmetology, ICT, Agriculture) or section (e.g. sports, clubs etc.)
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};
