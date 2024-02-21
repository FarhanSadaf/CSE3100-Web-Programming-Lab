<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    public function show($id)
    {
        // Get a single category from the database using Query Builder
        // Similar SQL: SELECT * FROM categories WHERE id = $id
        $category = DB::table('categories')->where('id', $id)->first();

        // Return the results as JSON
        return response()->json($category);
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'budget' => 'required',
            'month_id' => 'required'
        ]);

        // Insert a new category into the database using Query Builder
        // Similar SQL: INSERT INTO categories (name, budget, month_id) VALUES ($name, $budget, $month_id)
        $id = DB::table('categories')->insertGetId([
            'name' => $request->name,
            'budget' => $request->budget,
            'month_id' => $request->month_id
        ]);

        // Return the ID of the newly created category, 201 status code for successful creation
        return response()->json(['id' => $id], 201);
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'budget' => 'required',
            'month_id' => 'required'
        ]);

        // Update the category in the database using Query Builder
        // Similar SQL: UPDATE categories SET name = $name, budget = $budget, month_id = $month_id WHERE id = $id
        $affected = DB::table('categories')->where('id', $id)->update([
            'name' => $request->name,
            'budget' => $request->budget,
            'month_id' => $request->month_id
        ]);

        if ($affected === 0) {
            // Return 404 response if no rows were affected
            return response()->json(['error' => 'Category not found'], 404);
        }

        // Return 200 response for successful update
        return response()->json(['message' => 'Category updated successfully']);
    }

    public function delete($id)
    {
        // Delete the category from the database using Query Builder
        // Similar SQL: DELETE FROM categories WHERE id = $id
        $deleted = DB::table('categories')->where('id', $id)->delete();

        if ($deleted === 0) {
            // Return 404 response if no rows were deleted
            return response()->json(['error' => 'Category not found'], 404);
        }

        // Return a success response
        return response()->json(['message' => 'Category deleted successfully']);
    }
}
