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
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->string('borrowing_date');
            $table->string('returning_date');

            $table->foreignId('volunteerId')
                ->nullable()
                ->constrained('volunteers')
                ->onDelete('set null');

            $table->foreignId('book_Id')
                ->nullable()
                ->constrained('books')
                ->onDelete('set null');

            $table->foreignId('memberId')
                ->nullable()
                ->constrained('members')
                ->onDelete('set null');
            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('records');
    }
};
