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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidate_id')->constrained('candidates')->onDelete('cascade'); // Foreign key ke candidates
            $table->string('title'); // Judul kegiatan kampanye
            $table->text('description'); // Deskripsi kegiatan
            $table->dateTime('campaign_date'); // Tanggal dan waktu kampanye
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_campaigns');
    }
};
