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
        Schema::create('upload_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // e.g. "Tenders", "Vacancies"
            $table->string('file_path'); //path
            $table->string('description')->nullable(); // optional description
            $table->string('slug')->unique()->nullable(); // optional, for routes
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('upload_categories');
    }
};
