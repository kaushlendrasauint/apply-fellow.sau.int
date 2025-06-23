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
            $table->integer('number_books_edited')->nullable();
            $table->integer('number_books_authored')->nullable();
            $table->integer('number_research_publications')->nullable();
            $table->integer('number_book_chapters')->nullable();
            $table->integer('number_patents')->nullable();
            $table->integer('number_research_grants')->nullable();
            $table->integer('number_presentations')->nullable();
            $table->text('publications')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('application_forms', function (Blueprint $table) {
            $table->dropColumn([
                'number_books_edited',
                'number_books_authored',
                'number_research_publications',
                'number_book_chapters',
                'number_patents',
                'number_research_grants',
                'number_presentations',
                'publications',
            ]);
        });
    }
};
