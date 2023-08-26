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
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('country_id');
            $table->foreignId('role_id')->default(3);

            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('role_id')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['country_id']);
            $table->dropForeign(['role_id']);
            //there might be situations where you want to ensure proper cleanup or need to manage the order of operations, especially when dealing with complex relationships and migrations.
            $table->dropColumn(['country_id', 'role_id']);
        });
    }
};
