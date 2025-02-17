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
            $table->datetime('date');
            $table->boolean('has_been_scheduled', false);
            $table->boolean('has_been_completed', false);
            $table->text('reason');
            $table->text('beginning_and_evolution_of_current_condition')->nullable();

            // interrogation by systems and apparatus
            $table->text('respiratory_or_cardiovascular')->nullable();
            $table->text('digestive')->nullable();
            $table->text('endocrine')->nullable();
            $table->text('muscle_skeletal')->nullable();
            $table->text('genitourinary')->nullable();
            $table->text('hematopoietic_lymphatic')->nullable();
            $table->text('study_plan')->nullable();
            $table->text('skin_and_appendages')->nullable();
            $table->text('neurological_psychiatric')->nullable();

            $table->text('previous_admission_laboratory_exams')->nullable();

            // analysis, integration and therapeutic
            $table->text('possible_diagnoses')->nullable();
            $table->text('initial_therapeutic')->nullable();
            $table->text('condition')->nullable();
            $table->text('prognosis')->nullable();

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
            $table->timestamps();

            $table->foreignId('medical_consultation_id')->constrained('medical_consultations')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });


        Schema::create('clinic_cards', function(Blueprint $table){
            $table->id();
            $table->string('blood_pressure');
            $table->string('heart_rate');
            $table->string('temperature');
            $table->string('rheumatoid_factor');
            $table->decimal('weight');
            $table->decimal('height');
            $table->text('exterior_habitus');
            $table->text('skin_and_appendages');
            $table->text('head_and_neck');
            $table->text('chest');
            $table->text('abdomen');
            $table->text('genitals');
            $table->text('limbs');
            $table->text('nervous_system');
            $table->timestamps();

            $table->foreignId('patient_id')->constrained('patients')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::create('current_medications', function(Blueprint $table){
            $table->id();
            $table->string('trade_name');
            $table->string('active_ingredient');
            $table->decimal('presentation_mg')->nullable();
            $table->decimal('dosage_mg');
            $table->string('via');
            $table->string('frequency');
            $table->date('last_administration_date');
            $table->timestamps();

            $table->foreignId('patient_id')->constrained('patients')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('consultation_id')->constrained('medical_consultations')
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
        Schema::dropIfExists('clinic_cards');
        Schema::dropIfExists('current_medications');
    }
};
