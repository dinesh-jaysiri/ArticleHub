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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->tinyText('body');
            $table->foreignId('article_id')->index();
            $table->foreign('article_id')->references('id')->on('articles')->cascadeOnDelete();


            $table->foreignId('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users');

            $table->foreignId('parent_id')->nullable()->index();
            $table->foreign('parent_id')->references('id')->on('comments');
            $table->timestamps();

        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
