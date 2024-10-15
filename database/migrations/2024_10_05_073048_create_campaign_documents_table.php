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
        Schema::create('campaign_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campaign_id')->constrained('campaigns')->onDelete('cascade'); // Foreign key ke campaigns
            $table->string('type'); // Tipe dokumen (foto, video, dokumen tertulis)
            $table->string('file_path'); // Path dokumen
            $table->text('summary')->nullable(); // Rangkuman kampanye
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaign_documents');
    }
};
