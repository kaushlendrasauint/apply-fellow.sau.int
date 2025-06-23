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
        Schema::table('application_forms', function (Blueprint $table) {
            // Adding doctoral fields
            $table->string('doctoral_joining')->nullable();
            $table->string('doctoral_award')->nullable();
            $table->string('doctoral_grades')->nullable();

            // Adding master fields
            $table->string('master_degree')->nullable();
            $table->string('master_university')->nullable();
            $table->string('master_joining')->nullable();
            $table->string('master_award')->nullable();
            $table->string('master_grades')->nullable();

            // Adding bachelor fields
            $table->string('bachelor_degree')->nullable();
            $table->string('bachelor_university')->nullable();
            $table->string('bachelor_joining')->nullable();
            $table->string('bachelor_award')->nullable();
            $table->string('bachelor_grades')->nullable();

            // Adding school fields
            $table->string('school_degree')->nullable();
            $table->string('school_university')->nullable();
            $table->string('school_joining')->nullable();
            $table->string('school_award')->nullable();
            $table->string('school_grades')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('application_forms', function (Blueprint $table) {
            //
        });
    }
};
