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
        Schema::table('eid_tohfa_leads', function (Blueprint $table) {
            $table->text('location_history')->nullable()->after('location_captured_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('eid_tohfa_leads', function (Blueprint $table) {
            $table->dropColumn('location_history');
        });
    }
};
