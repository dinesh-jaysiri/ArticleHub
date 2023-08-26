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
        Schema::create('article_saved_list', function (Blueprint $table) {
            $table->foreignId('article_id')->index();
            $table->foreign('article_id')->references('id')->on('articles')->cascadeOnDelete();

            $table->foreignId('saved_list_id')->index();
            $table->foreign('saved_list_id')->references('id')->on('saved_lists')->cascadeOnDelete();
            $table->primary(['article_id','saved_list_id']);


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_saved_list');
    }
};
