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
        Schema::create('downloads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('file'); // File path
            $table->string('type')->comment('Type of file (e.g., PDF, DOCX)');
            $table->string('category')->comment('Category of the download (e.g., brochure, form)');
            $table->integer('size')->comment('Size in bytes');
            $table->text('description')->nullable();
            $table->string('created_by')->nullable()->comment('User who created the download entry');
            $table->string('updated_by')->nullable()->comment('User who last updated the download entry');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('downloads');
    }
};
