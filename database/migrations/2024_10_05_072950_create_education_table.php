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
        Schema::create('educations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidate_id')->constrained('candidates')->onDelete('cascade'); // Foreign key ke candidates
            $table->string('degree'); // Gelar
            $table->string('institution'); // Institusi pendidikan
            $table->year('year_of_graduation'); // Tahun lulus
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education');
    }
};
