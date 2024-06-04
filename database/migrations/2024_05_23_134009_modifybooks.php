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

        Schema::table('books', function (Blueprint $table) {

            $table->string('title');
            $table->string('author');
            $table->string('publisherName');
            $table->year('published_year');
            $table->string('category');
            $table->string('BookStatus')->default('Available');
            $table->foreignId('volunteerId')
                ->nullable()
                ->constrained('volunteers')
                ->onDelete('set null');
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {

            $table->dropColumn('title');
            $table->dropColumn('author');
            $table->dropColumn('publisherName');
            $table->dropColumn('published_year');
            $table->dropColumn('category');
            $table->dropColumn('BookStatus');
            $table->dropForeign('volunteerId');
            $table->dropColumn('volunteerId');
        });
    }
};
