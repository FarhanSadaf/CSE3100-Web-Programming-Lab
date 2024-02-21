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
        /*
        // Similar create table SQL command would be
        CREATE TABLE monthly_expenses (
            id INT AUTO_INCREMENT PRIMARY KEY,
            month VARCHAR(255) NOT NULL,
            year VARCHAR(255) NOT NULL,
            budget DECIMAL(8, 2) NOT NULL,
            user_id INT,
            FOREIGN KEY (user_id) REFERENCES users(id)
        );
        */
        Schema::create('monthly_expenses', function (Blueprint $table) {
            $table->id();
            $table->string('month');
            $table->string('year');
            $table->decimal('budget', 8, 2);

            // Foreign key constraint
            $table->foreignId('user_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monthly_expenses');
    }
};
