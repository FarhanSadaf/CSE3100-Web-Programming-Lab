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
        /* Similar SQL
        CREATE TABLE profiles (
            id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            user_id BIGINT UNSIGNED NOT NULL,
            bio TEXT
        );
        */
        Schema::create('profiles', function (Blueprint $table) {
            // Create columns 'id' (PK), 'user_id', 'bio'
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->text('bio')->nullable();

            // Create foreign key 'user_id' that references 'id' on 'users' table
            $table->foreign('user_id')->references('id')->on('users');

            // Or
            // $table->foreignId('user_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
