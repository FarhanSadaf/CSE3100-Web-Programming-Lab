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
        // Similar to the following SQL
        CREATE TABLE expenses (
            id INT AUTO_INCREMENT PRIMARY KEY,
            amount DECIMAL(8, 2) NOT NULL,
            description TEXT,
            expense_date DATE NOT NULL,
            location VARCHAR(255),
            payment_method VARCHAR(255) NOT NULL,
            category_id INT,
            FOREIGN KEY (category_id) REFERENCES categories(id)
        );
        */
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount', 8, 2);
            $table->text('description')->nullable();
            $table->date('expense_date');
            $table->string('location')->nullable();
            $table->string('payment_method');

            // Foreign key constraint
            $table->foreignId('category_id')->constrained();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
