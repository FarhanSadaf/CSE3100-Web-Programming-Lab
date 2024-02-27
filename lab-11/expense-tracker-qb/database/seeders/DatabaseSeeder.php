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

        // Insert 10 fake records into the users table
        for ($i = 0; $i < 10; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $faker->password,
            ]);
        }

        // Insert 20 fake records into the monthly_expenses table
        for ($i = 0; $i < 20; $i++) {
            DB::table('monthly_expenses')->insert([
                'month' => $faker->monthName,
                'year' => $faker->year,
                'budget' => $faker->randomFloat(2, 100, 1000),
                'user_id' => $faker->numberBetween(1, 10),
            ]);
        }

        // Insert 20 fake records into the categories table
        for ($i = 0; $i < 20; $i++) {
            DB::table('categories')->insert([
                'name' => $faker->word,
                'budget' => $faker->randomFloat(2, 100, 1000),
                'month_id' => $faker->numberBetween(1, 20),
            ]);
        }

        // Insert 100 fake records into the expenses table
        for ($i = 0; $i < 100; $i++) {
            DB::table('expenses')->insert([
                'amount' => $faker->randomFloat(2, 1, 100),
                'description' => $faker->sentence,
                'expense_date' => $faker->date,
                'location' => $faker->city,
                'payment_method' => $faker->creditCardType,
                'category_id' => $faker->numberBetween(1, 20),
            ]);
        }
    }
}
