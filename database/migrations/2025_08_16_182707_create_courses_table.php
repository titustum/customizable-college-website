<?php

use App\Models\Department;
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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Department::class);
            $table->string('name'); // name e.g. Diploma in ICT
            $table->string('photo')->nullable();
            $table->string('requirement'); // KCSE garde i.e C+ or any other certfications
            $table->string('duration'); // e.g. 3 years
            $table->string('exam_body'); // e.g. KNEC, CDAAC etc.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
