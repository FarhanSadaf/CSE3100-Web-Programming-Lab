<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MonthlyExpensesController extends Controller
{
    public function getMonthlyExpensesByUser($userId)
    {
        // Get all monthly expenses of a user from the database using Query Builder
        // Similar SQL: SELECT * FROM monthly_expenses WHERE user_id = $userId
        $monthlyExpenses = DB::table('monthly_expenses')->where('user_id', $userId)->get();

        // Return the results as JSON
        return response()->json($monthlyExpenses);
    }

    public function createMonthlyExpenseOfUser(Request $request, $userId)
    {
        // Validate the request data
        $request->validate([
            'month' => 'required',
            'year' => 'required',
            'budget' => 'required'
        ]);

        // Insert a new monthly expense into the database using Query Builder
        // Similar SQL: INSERT INTO monthly_expenses (month, year, budget, user_id) VALUES ($month, $year, $budget, $userId)
        $id = DB::table('monthly_expenses')->insertGetId([
            'month' => $request->month,
            'year' => $request->year,
            'budget' => $request->budget,
            'user_id' => $userId
        ]);

        // Return the ID of the newly created monthly expense, 201 status code for successful creation
        return response()->json(['id' => $id], 201);
    }

    public function updateMonthlyExpense(Request $request, $monthlyExpenseId)
    {
        // Validate the request data
        $request->validate([
            'month' => 'required',
            'year' => 'required',
            'budget' => 'required'
        ]);

        // Update the monthly expense in the database using Query Builder
        // Similar SQL: UPDATE monthly_expenses SET month = $month, year = $year, budget = $budget WHERE id = $monthlyExpenseId
        $affected = DB::table('monthly_expenses')->where('id', $monthlyExpenseId)->update([
            'month' => $request->month,
            'year' => $request->year,
            'budget' => $request->budget
        ]);

        if ($affected === 0) {
            // Return 404 response if no rows were affected
            return response()->json(['error' => 'Monthly expense not found'], 404);
        }

        // Return a success response
        return response()->json(['message' => 'Monthly expense updated successfully']);
    }

    public function deleteMonthlyExpense($monthlyExpenseId)
    {
        // Delete the monthly expense from the database using Query Builder
        // Similar SQL: DELETE FROM monthly_expenses WHERE id = $monthlyExpenseId
        $affected = DB::table('monthly_expenses')->where('id', $monthlyExpenseId)->delete();

        if ($affected === 0) {
            // Return 404 response if no rows were affected
            return response()->json(['error' => 'Monthly expense not found'], 404);
        }

        // Return a success response
        return response()->json(['message' => 'Monthly expense deleted successfully']);
    }
}
