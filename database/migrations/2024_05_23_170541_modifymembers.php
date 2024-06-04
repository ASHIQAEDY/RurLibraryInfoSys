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
        Schema::table('members', function (Blueprint $table) {
            $table->string('Name');
            $table->integer('Ic_No');
            $table->string('Address');
            $table->string('PhoneNumber');
            $table->foreignId('VolunteerId')
                ->nullable()
                ->constrained('volunteers')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('members', function (Blueprint $table) {

            $table->dropColumn('Name');
            $table->dropColumn('Ic_No');
            $table->dropColumn('Address');
            $table->dropColumn('PhoneNumber');

            $table->dropForeign('VolunteerId');
            $table->dropColumn('VolunteerId');
        });
    }
};
