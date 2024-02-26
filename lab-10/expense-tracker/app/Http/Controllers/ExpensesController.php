<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpensesController extends Controller
{
    public function createExpenseOfCategory($categoryId, Request $request)
    {
        // Validate the request data
        $request->validate([
            'amount' => 'required|numeric',
            'description' => 'nullable',
            'expense_date' => 'required|date',
            'location' => 'nullable',
            'payment_method' => 'required'
        ]);

        // Create a new expense and get the ID
        $id = DB::table('expenses')->insertGetId([
            'amount' => $request->input('amount'),
            'description' => $request->input('description'),
            'expense_date' => $request->input('expense_date'),
            'location' => $request->input('location'),
            'payment_method' => $request->input('payment_method'),
            'category_id' => $categoryId
        ]);
        
        // Return the newly created expense ID as JSON
        return response()->json(['id' => $id], 201);

    }

    public function getExpensesByUser($userId)
    {
        // Get all expenses for a specific user from the database using Query Builder
        // Join with the categories table, then monthly_expenses, then users table to get the user's expenses
        // Similar SQL: SELECT expenses.*, categories.name AS category_name FROM expenses JOIN categories ON expenses.category_id = categories.id JOIN monthly_expenses ON categories.month_id = monthly_expenses.id JOIN users ON monthly_expenses.user_id = users.id WHERE users.id = $userId
        $expenses = DB::table('expenses')
            ->join('categories', 'expenses.category_id', '=', 'categories.id')
            ->join('monthly_expenses', 'categories.month_id', '=', 'monthly_expenses.id')
            ->join('users', 'monthly_expenses.user_id', '=', 'users.id')
            ->where('users.id', $userId)
            ->select('expenses.*', 'categories.name AS category_name')
            ->get();

        // Return the results as JSON
        return response()->json($expenses);
    }
}
