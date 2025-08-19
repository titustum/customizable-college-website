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
            $table->string('photo'); // captivating pic of students of departments doing somethin; will be displayed on landing page.
            $table->string('short_desc'); // short captivating desc that will be loaded in landing page e.g. Master the art and science of Beauty Therapy and Hairdressing with our amazing programs.
            $table->text('full_desc'); // The description that will be displayed on single page when user selects to view that department
            $table->string('banner_pic'); // Banner pic that will be displayed on single page when user selects to view that department
            $table->timestamps();
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
