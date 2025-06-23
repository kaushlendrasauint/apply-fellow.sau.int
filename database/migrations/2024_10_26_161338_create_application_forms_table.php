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
        Schema::create('application_forms', function (Blueprint $table) {
            $table->id();
            $table->string('position');
            $table->string('faculty_department');
            $table->string('bank_draft_no')->nullable();
            $table->date('draft_date')->nullable();
            $table->string('payable_at')->nullable();
            $table->string('ref_no')->nullable();
            $table->date('ref_date')->nullable();
            $table->string('full_name');
            $table->string('gender');
            $table->string('spouse_name')->nullable();
            $table->string('nationality');
            $table->date('dob');
            $table->string('email')->unique();
            $table->string('mobile');
            $table->json('education')->nullable(); // Store education as JSON
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application_forms');
    }
};
