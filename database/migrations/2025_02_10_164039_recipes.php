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
        Schema::create('recipes', function(Blueprint $table) {
            $table->id();
            $table->datetime('date');

            $table->foreignId('medical_consultation_id')->constrained('medical_consultations')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('patient_id')->constrained('patients')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::create('recipes_detail', function(Blueprint $table) {
            $table->id();
            $table->string('description');

            $table->foreignId('recipe_id')->constrained('recipes')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes_detail');
        Schema::dropIfExists('recipes');
    }
};
