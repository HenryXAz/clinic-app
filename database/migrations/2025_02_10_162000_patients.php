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
            $table->timestamps();

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
