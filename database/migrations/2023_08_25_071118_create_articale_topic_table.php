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
        Schema::create('article_topic', function (Blueprint $table) {
            $table->foreignId('topic_id')->index();
            $table->foreign('topic_id')->references('id')->on('topics')->cascadeOnDelete();

            $table->foreignId('article_id')->index();
            $table->foreign('article_id')->references('id')->on('articles')->cascadeOnDelete();
            
            $table->primary(['topic_id','article_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articale_topic');
    }
};
