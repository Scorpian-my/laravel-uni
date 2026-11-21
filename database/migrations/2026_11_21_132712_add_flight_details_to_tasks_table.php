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
        Schema::table('tasks', function (Blueprint $table) {
            $table->string('origin')->nullable()->after('title');
            $table->string('destination')->nullable()->after('origin');
            $table->dateTime('departure_at')->nullable()->after('destination');
            $table->dateTime('arrival_at')->nullable()->after('departure_at');
            $table->string('flight_number')->nullable()->after('arrival_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn(['origin', 'destination', 'departure_at', 'arrival_at', 'flight_number']);
        });
    }
};
