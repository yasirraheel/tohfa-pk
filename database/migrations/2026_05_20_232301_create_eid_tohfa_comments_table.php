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
        Schema::create('eid_tohfa_comments', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('avatar_url')->nullable();
            $table->text('comment_text');
            $table->string('time_ago')->default('1m');
            $table->boolean('is_liked')->default(true);
            $table->boolean('is_reply')->default(false);
            $table->integer('order')->default(0);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eid_tohfa_comments');
    }
};
