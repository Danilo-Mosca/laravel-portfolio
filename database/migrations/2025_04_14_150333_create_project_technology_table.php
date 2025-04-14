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
        Schema::create('project_technology', function (Blueprint $table) {
            $table->id();

            // In questa tabella Ponte aggiungo entrambe le chiavi esterne della tabella projects e della tabella technologies (che fanno rispettivamente entrambe riferimento agli id delle due tabelle citate):
            $table->foreignId('projects_id');
            $table->foreignId('technologies_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_technology');
    }
};
