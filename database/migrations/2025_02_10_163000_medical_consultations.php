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
        Schema::create('medical_consultations', function (Blueprint $table) {
            $table->id();
            $table->datetime('start_date');
            $table->datetime('end_date');
            $table->string('diagnosis')->nullable();
            $table->text('treatment')->nullable();
            $table->timestamps();

            $table->foreignId('patient_id')->constrained('patients')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('doctor_id')->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::create('medical_consultations_detail', function(Blueprint $table){
            $table->id();
            $table->text('description');

            $table->foreignId('medical_consultation_id')->constrained('medical_consultations')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_consultations_detail');
        Schema::dropIfExists('medical_consultations');
    }
};
