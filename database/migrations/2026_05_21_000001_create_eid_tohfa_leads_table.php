<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('eid_tohfa_leads', function (Blueprint $table) {
            $table->id();
            $table->string('cnic', 13)->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->decimal('accuracy', 10, 2)->nullable();
            $table->timestamp('location_captured_at')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->string('first_visit_ip', 45)->nullable();
            $table->timestamp('first_visit_at')->nullable();
            $table->string('status', 30)->default('visited');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('eid_tohfa_leads');
    }
};
