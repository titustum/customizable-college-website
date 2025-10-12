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
        Schema::create('institutions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo')->nullable();
            $table->string('principal_name')->nullable();
            $table->string('principal_photo')->nullable(); // image path
            $table->text('welcome_message')->nullable();
            $table->string('motto')->nullable();
            $table->text('vision')->nullable();
            $table->text('mission')->nullable();
            $table->text('about_us')->nullable(); // NEW
            $table->string('primary_color')->nullable(); // NEW
            $table->string('primary_font')->nullable(); // NEW
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable(); // Physical address
            $table->string('longitude')->nullable(); // Longitude
            $table->string('latitude')->nullable(); // Latitude

            // Socials
            $table->string('facebook')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('x')->nullable(); // Twitter
            $table->string('youtube')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institutions');
    }
};
