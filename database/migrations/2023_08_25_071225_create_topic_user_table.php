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
        Schema::create('topic_user', function (Blueprint $table) {
            $table->foreignId('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users');

            $table->foreignId('topic_id')->index();
            $table->foreign('topic_id')->references('id')->on('topics')->cascadeOnDelete();

            $table->primary(['user_id','topic_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topic_user');
    }
};
