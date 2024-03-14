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
        CREATE TABLE post_tag (
            post_id BIGINT UNSIGNED NOT NULL,
            tag_id BIGINT UNSIGNED NOT NULL
        );
        */
        Schema::create('post_tag', function (Blueprint $table) {
            // Pivot table for 'posts' and 'tags' tables
            // Create columns 'post_id' (FK), 'tag_id' (FK)
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('tag_id');

            // Create foreign key 'post_id' that references 'id' on 'posts' table
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');

            // Create foreign key 'tag_id' that references 'id' on 'tags' table
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');

            // Or
            // $table->foreignId('post_id')->constrained()->onDelete('cascade');
            // $table->foreignId('tag_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_tag');
    }
};
