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
        Schema::create('profiles', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id')->unique();
            $table->string('gender')->nullable();
            $table->string('phone_number')->nullable()->unique();
            $table->date('birth_date')->nullable();
            $table->uuid('village_id')->nullable();
            $table->string('address')->nullable();
            $table->string('profile_image')->nullable();
            $table->foreign('village_id')->references('id')->on('villages')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropForeign(['village_id']);
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('profiles');
    }
};
