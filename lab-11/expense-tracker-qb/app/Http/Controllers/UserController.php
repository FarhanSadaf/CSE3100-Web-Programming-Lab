<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        // Get all users from the database using Query Builder
        // Similar SQL: SELECT * FROM users
        $users = DB::table('users')->get();

        // Return the results as JSON
        return response()->json($users);
    }
    
    public function show($id)
    {
        // Get a single user from the database using Query Builder
        // Similar SQL: SELECT * FROM users WHERE id = $id
        $user = DB::table('users')->where('id', $id)->first();

        // Return the results as JSON
        return response()->json($user);
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // If a user with the same email already exists, return an error
        if ($this->emailExists($request->email)) {
            return response()->json(['message' => 'Email already exists'], 400);
        }

        // Insert a new user into the database using Query Builder
        // Similar SQL: INSERT INTO users (name, email, password) VALUES ($name, $email, $password)
        $id = DB::table('users')->insertGetId([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        // Return the ID of the newly created user, 201 status code for successful creation
        return response()->json(['id' => $id], 201);
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Update a user in the database using Query Builder
        // Similar SQL: UPDATE users SET name = $name, email = $email, password = $password WHERE id = $id
        $affected = DB::table('users')->where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if ($affected === 0) {
            // Return an error response
            return response()->json(['message' => 'User not found'], 404);
        }

        // Return a success response
        return response()->json(['message' => 'User updated successfully']);
    }

    public function delete($id)
    {
        // Delete a user from the database using Query Builder
        // Similar SQL: DELETE FROM users WHERE id = $id
        $affected = DB::table('users')->where('id', $id)->delete();

        if ($affected === 0) {
            // Return an error response
            return response()->json(['message' => 'User not found'], 404);
        }

        // Return a success response
        return response()->json(['message' => 'User deleted successfully']);
    }

    public function emailExists($email)
    {
        // Check if a user with the given email exists in the database using Query Builder
        // Similar SQL: SELECT * FROM users WHERE email = $email
        $user = DB::table('users')->where('email', $email)->first();

        // Return true if a user with the given email exists, false otherwise
        return $user !== null;
    }
}
