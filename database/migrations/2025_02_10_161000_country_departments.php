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
        Schema::create('country_departments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('country_towns', function(Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();

            $table->foreignId('country_department_id')->constrained('country_departments')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            ;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('country_towns');
        Schema::dropIfExists('country_departments');
    }
};
