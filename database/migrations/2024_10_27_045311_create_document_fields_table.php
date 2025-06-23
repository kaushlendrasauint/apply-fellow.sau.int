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
            Schema::table('application_forms', function (Blueprint $table) {
                $table->string('application_fee')->nullable();
                $table->string('birth_certification')->nullable();
                $table->string('degrees')->nullable();
                $table->string('latest_cv')->nullable();
                $table->string('no_objection_certificate')->nullable();
                $table->string('recent_passport')->nullable();
                $table->string('joining_date')->nullable();
                $table->string('consider_lower_position')->nullable();
                $table->string('other_information')->nullable();
                $table->string('sau_reasons')->nullable();
                $table->string('legal_offences')->nullable();
                $table->string('health_problems')->nullable();
                $table->string('englishProficiency')->nullable();
                $table->string('adminExperience')->nullable();
                $table->string('reason_joining')->nullable();
            });
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
