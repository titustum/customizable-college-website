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
        Schema::create('department_team_member', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignId('team_member_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignId('role_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();
            $table->string('custom_title')->nullable();
            // e.g. "Head Coach", "Finance Officer"
            $table->timestamps();
            $table->unique(['department_id', 'team_member_id', 'role_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('department_team_member');
    }
};
