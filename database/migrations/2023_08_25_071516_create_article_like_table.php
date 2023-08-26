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
        Schema::create('article_like', function (Blueprint $table) {
            $table->foreignId('article_id')->index();
            $table->foreign('article_id')->references('id')->on('articles')->cascadeOnDelete();

            $table->foreignId('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users');

            $table->primary(['user_id','article_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_like');
    }
};
