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
            $table->string('cnic', 13)->nullable()->change();
            $table->decimal('latitude', 10, 7)->nullable()->change();
            $table->decimal('longitude', 10, 7)->nullable()->change();
            $table->string('first_visit_ip', 45)->nullable()->after('user_agent');
            $table->timestamp('first_visit_at')->nullable()->after('first_visit_ip');
            $table->string('status', 30)->default('visited')->after('first_visit_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('eid_tohfa_leads', function (Blueprint $table) {
            $table->dropColumn(['first_visit_ip', 'first_visit_at', 'status']);
        });
    }
};
