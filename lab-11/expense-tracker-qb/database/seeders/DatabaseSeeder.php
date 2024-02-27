<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Use faker library to generate fake data
        $faker = Faker::create();

        // Insert 3 fake records into the users table
        for ($userId = 1; $userId <= 3; $userId++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $faker->password,
            ]);

            // For each user, insert 5 fake records into the monthly_expenses table
            $monthRecords = 5;
            $startMonthId = ($userId - 1) * $monthRecords + 1;
            $endMonthId = $startMonthId + $monthRecords;
            for ($monthId = $startMonthId; $monthId < $endMonthId; $monthId++) {
                $month = $faker->monthName;
                $year = $faker->year;
                DB::table('monthly_expenses')->insert([
                    'month' => $month,
                    'year' => $year,
                    'budget' => $faker->randomFloat(2, 2000, 10000),
                    'user_id' => $userId,
                ]);

                // For each monthly expense, insert 5 fake records into the categories table
                $categoryRecords = 5;
                $startCategoryId = ($monthId - 1) * $categoryRecords + 1;
                $endCategoryId = $startCategoryId + $categoryRecords;
                for ($categoryId = $startCategoryId; $categoryId < $endCategoryId; $categoryId++) {
                    $categories = ['Groceries', 'Entertainment', 'Transportation', 'Utilities', 'Healthcare', 'Insurance', 'Education', 'Savings', 'Debt', 'Personal Care', 'Miscellaneous'];
                    DB::table('categories')->insert([
                        // Category name e.g. 'Groceries', 'Entertainment', 'Transportation', etc. 
                        'name' => $categories[array_rand($categories)],
                        'budget' => $faker->randomFloat(2, 500, 3000),
                        'month_id' => $monthId, 
                    ]);

                    // For each category, insert 5 fake records into the expenses table
                    $expenseRecords = 5;
                    $startExpenseId = ($categoryId - 1) * $expenseRecords + 1;
                    $endExpenseId = $startExpenseId + $expenseRecords;
                    for ($expenseId = $startExpenseId; $expenseId < $endExpenseId; $expenseId++) {
                        DB::table('expenses')->insert([
                            'amount' => $faker->randomFloat(2, 10, 1000),
                            'description' => $faker->sentence,
                            'expense_date' => $faker->dateTimeBetween($year . '-' . $month . '-01', $year . '-' . $month . '-30'), // Date is in the month and year of the monthly expense
                            'location' => $faker->city,
                            'payment_method' => $faker->creditCardType,
                            'category_id' => $categoryId, 
                        ]);
                    }
                }
            }
        }

}
}