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
        Schema::create('role_team_member', function (Blueprint $table) {
            $table->id(); $table->foreignId('team_member_id') ->constrained() ->cascadeOnDelete(); 
            $table->foreignId('role_id') ->constrained() ->cascadeOnDelete(); 
            $table->boolean('is_primary') ->default(false); // main role for display purposes 
            $table->boolean('is_active') ->default(true); 
            $table->date('start_date') ->nullable(); 
            $table->date('end_date') ->nullable(); 
            $table->timestamps(); 
            $table->unique([ 'team_member_id', 'role_id' ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_team_member');
    }
};
