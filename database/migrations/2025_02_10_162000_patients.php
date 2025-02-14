<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('names');
            $table->string('last_names');
            $table->date('birth_date');
            $table->string('community')->nullable();
            $table->string('sector')->nullable();
            $table->enum('gender', ['M', 'F']);
            $table->string('dpi');
            $table->enum('ethnicity', ['MAYA', 'GARIFUNA', 'MESTIZO', 'XINCA']);
            $table->enum('academic_level', ['ILLITERATE', 'PRIMARY', 'SECONDARY', 'HIGH_SCHOOL', 'UNIVERSITY']);
            $table->enum('marital_status', ['SINGLE', 'MARRIED', 'DIVORCED', 'WIDOWER']);
            $table->boolean('is_working', true);
            $table->string('profession');
            $table->boolean('is_immigrant', false);
            $table->string('tutor_name')->nullable();
            $table->string('tutor_relationship')->nullable();
            $table->string('phone')->nullable();
            $table->string('personal_phone');
            $table->string('email')->nullable();
            $table->string('religion');
            $table->timestamps();

            // hereditary background
            $table->string('diabetes')->nullable();
            $table->string('nephropathy')->nullable();
            $table->string('high_blood_pressure')->nullable();
            $table->string('malformations')->nullable();
            $table->string('malformations_type')->nullable();
            $table->string('cancer')->nullable();
            $table->string('cancer_type')->nullable();
            $table->string('heart_disease')->nullable();
            $table->text('others_hereditary_background')->nullable();

            // no pathology background
            $table->boolean('smoking', false);
            $table->integer('how_many_smoke_per_day')->nullable();
            $table->integer('years_of_smoking_or_exposition')->nullable();
            $table->boolean('ex_smoker', false);
            $table->boolean('passive_smoker', false);

            $table->boolean('alcoholic', false);
            $table->integer('ml_per_week')->nullable();
            $table->boolean('ex_alcoholic_or_ocasional', false);
            $table->boolean('allergies', false);
            $table->string('allergies_description')->nullable();

            $table->string('blood_type')->nullable();
            $table->boolean('basic_home_services', true);

            $table->boolean('drug_dependency', false);
            $table->text('drug_dependency_description')->nullable();
            $table->text('drug_dependency_years')->nullable();

            $table->text('others_no_pathology_background')->nullable();

            // obstetric gynecological history
            $table->integer('menarche_year')->nullable();
            $table->boolean('regular_cycles')->nullable();
            $table->string('menstrual_rhythm')->nullable();
            $table->date('last_menstruation_date')->nullable();
            $table->boolean('polymenorrhea')->nullable();
            $table->boolean('hypermenorrhea')->nullable();
            $table->boolean('dysmenorrhea')->nullable();
            $table->integer('ivsa_year')->nullable();
            $table->boolean('incapacitante')->nullable();
            $table->integer('sexual_partners_number')->nullable();
            $table->string('g')->nullable();
            $table->string('p')->nullable();
            $table->string('a')->nullable();
            $table->string('c')->nullable();
            $table->date('last_cytology_date')->nullable();
            $table->text('citoloy_result')->nullable();
            $table->string('current_contraceptive_method')->nullable();


            // personal pathology history
            $table->text('childhood_diseases')->nullable();
            $table->text('diseases_sequel')->nullable();
            $table->boolean('previous_hospitalizations', false);
            $table->text('previous_hospitalizations_description')->nullable();
            $table->boolean('surgical_history', false);
            $table->text('surgical_history_description')->nullable();
            $table->boolean('previous_transfusions', false);
            $table->text('previous_transfusions_description')->nullable();
            $table->boolean('fractures', false);
            $table->text('fractures_description')->nullable();
            $table->boolean('traumas', false);
            $table->text('traumas_description')->nullable();
            $table->boolean('other_disiases', false);
            $table->text('other_disiases_description')->nullable();


            $table->foreignId('birth_department')->constrained('country_departments')
                ->onUpdate('no action')
                ->onDelete('no action');

            $table->foreignId('department_id')->constrained('country_departments')
                ->onUpdate('no action')
                ->onDelete('no action');
            $table->foreignId('town_department_id')->constrained('country_towns')
                ->onUpdate('no action')
                ->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
