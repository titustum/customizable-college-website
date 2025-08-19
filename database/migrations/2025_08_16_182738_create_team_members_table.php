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
            $table->foreignIdFor(Department::class);
            $table->foreignIdFor(Role::class); // name e.g. Principal, Deputy Principal, HOD, Section Head, Trainer etc.
            $table->string('section_assigned')->nullable(); // section assigned i.e. games, clubs, etc
            $table->string('email')->unique()->nullable(); // email e.g.
            $table->string('name'); // fullname e.g. James Kariuki
            $table->string('photo')->nullable();
            $table->string('qualification'); // e.g. BSc. Computer Science
            $table->string('graduation_year')->default('2022'); // Years of experience e.g. 4 years
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
