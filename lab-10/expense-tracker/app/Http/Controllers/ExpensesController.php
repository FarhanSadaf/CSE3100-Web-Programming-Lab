<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpensesController extends Controller
{
    public function show($id)
    {
        // Get a single expense from the database using Query Builder
        // Similar SQL: SELECT * FROM expenses WHERE id = $id
        $expense = DB::table('expenses')->where('id', $id)->first();

        // Return the results as JSON
        return response()->json($expense);
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'amount' => 'required',
            'expense_date' => 'required',
            'payment_method' => 'required',
            'category_id' => 'required'
        ]);

        // Insert a new expense into the database using Query Builder
        // Similar SQL: INSERT INTO expenses (amount, description, expense_date, location, payment_method, category_id) VALUES ($amount, $description, $expense_date, $location, $payment_method, $category_id)
        $id = DB::table('expenses')->insertGetId([
            'amount' => $request->amount,
            'description' => $request->description,
            'expense_date' => $request->expense_date,
            'location' => $request->location,
            'payment_method' => $request->payment_method,
            'category_id' => $request->category_id
        ]);

        // Return the ID of the newly created expense, 201 status code for successful creation
        return response()->json(['id' => $id], 201);
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'amount' => 'required',
            'expense_date' => 'required',
            'payment_method' => 'required',
            'category_id' => 'required'
        ]);

        // Update the expense in the database using Query Builder
        // Similar SQL: UPDATE expenses SET amount = $amount, description = $description, expense_date = $expense_date, location = $location, payment_method = $payment_method, category_id = $category_id WHERE id = $id
        $affected = DB::table('expenses')->where('id', $id)->update([
            'amount' => $request->amount,
            'description' => $request->description,
            'expense_date' => $request->expense_date,
            'location' => $request->location,
            'payment_method' => $request->payment_method,
            'category_id' => $request->category_id
        ]);

        if ($affected === 0) {
            // Return 404 response if no rows were affected
            return response()->json(['error' => 'Expense not found'], 404);
        }

        // Return 200 status code for successful update
        return response()->json(['message' => 'Expense updated'], 200);
    }

    public function delete($id)
    {
        // Delete the expense from the database using Query Builder
        // Similar SQL: DELETE FROM expenses WHERE id = $id
        $deleted = DB::table('expenses')->where('id', $id)->delete();

        if ($deleted === 0) {
            // Return 404 response if no rows were deleted
            return response()->json(['error' => 'Expense not found'], 404);
        }

        // Return 200 status code for successful deletion
        return response()->json(['message' => 'Expense deleted'], 200);
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
