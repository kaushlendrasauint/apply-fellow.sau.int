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
            $table->string('doctoral_university')->nullable();
           // $table->string('doctoral_joining')->nullable();
            $table->text('courses_taught')->nullable();
            $table->text('compulsory_courses')->nullable();
            $table->text('optional_courses')->nullable();
            $table->text('other_courses')->nullable();
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
