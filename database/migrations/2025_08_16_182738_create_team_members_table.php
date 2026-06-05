<?php

use App\Models\Department;
use App\Models\Role;
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
        Schema::create('team_members', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Department::class)->nullable();
            $table->foreignIdFor(Role::class); // name e.g. Principal, Deputy Principal, HOD, HOS, Trainer etc.
            $table->string('section_assigned')->nullable(); // section assigned i.e. games, clubs, etc
            $table->string('email')->unique()->nullable(); // email e.g.
            $table->string('phone')->nullable(); // phone number e.g. +254712345678
            $table->string('name'); // fullname e.g. James Kariuki
            $table->string('photo')->nullable(); // photo path e.g. team_members/james_kariuki.jpg
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team_members');
    }
};
