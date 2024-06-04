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
        Schema::table('volunteers', function (Blueprint $table) {
        $table->foreignId('UserId')
            ->nullable()
            ->constrained('users')
            ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('volunteer', function (Blueprint $table) {
        $table->dropForeign('UserId');
        $table->dropColumn('UserId');
        });
    }
};
