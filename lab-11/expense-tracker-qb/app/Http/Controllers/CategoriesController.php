<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    public function getCategoriesByMonth($monthId)
    {
        // Get all categories of a month from the database using Query Builder
        // Similar SQL: SELECT * FROM categories WHERE month_id = $monthId
        $categories = DB::table('categories')->where('month_id', $monthId)->get();

        // Return the results as JSON
        return response()->json($categories);
    }

    public function createCategoryOfMonth(Request $request, $monthId)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'budget' => 'required'
        ]);

        // Insert a new category into the database using Query Builder
        // Similar SQL: INSERT INTO categories (name, budget, month_id) VALUES ($name, $budget, $monthId)
        $id = DB::table('categories')->insertGetId([
            'name' => $request->name,
            'budget' => $request->budget,
            'month_id' => $monthId
        ]);

        // Return the ID of the newly created category, 201 status code for successful creation
        return response()->json(['id' => $id], 201);
    }

    public function updateCategory(Request $request, $categoryId)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'budget' => 'required'
        ]);

        // Update the category in the database using Query Builder
        // Similar SQL: UPDATE categories SET name = $name, budget = $budget WHERE id = $categoryId
        $affected = DB::table('categories')->where('id', $categoryId)->update([
            'name' => $request->name,
            'budget' => $request->budget
        ]);

        if ($affected === 0) {
            // Return 404 response if no rows were affected
            return response()->json(['error' => 'Category not found'], 404);
        }

        // Return 200 response for successful update
        return response()->json(['message' => 'Category updated successfully']);
    }

    public function deleteCategory($categoryId)
    {
        // Delete the category from the database using Query Builder
        // Similar SQL: DELETE FROM categories WHERE id = $categoryId
        $deleted = DB::table('categories')->where('id', $categoryId)->delete();

        if ($deleted === 0) {
            // Return 404 response if no rows were deleted
            return response()->json(['error' => 'Category not found'], 404);
        }

        // Return a success response
        return response()->json(['message' => 'Category deleted successfully']);
    }
}
