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
        Schema::create('page_visits', function (Blueprint $table) {
            $table->id();
            $table->string('url'); // e.g. /courses
            $table->string('full_url')->nullable();
            $table->string('referer')->nullable();
            $table->string('ip')->nullable(); // consider hashing for privacy
            $table->text('user_agent')->nullable();
            $table->timestamp('visited_at')->default(now());
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_visits');
    }
};
