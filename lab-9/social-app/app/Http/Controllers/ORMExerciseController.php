<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ORMExerciseController extends Controller
{
    function create(Request $request)
    {
        // Inserting data into `users` table
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);
        return "Data inserted successfully";

        /*
        // Or
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->save();
        return "Data inserted successfully";
        */
    }

    function read(Request $request)
    {
        // Reading data from `users` table
        $users = User::all();
        return $users;

        /*
        // Reading data from `users` table with '=' condition
        $users = User::where('id', 1)->get();
        return $users;
        */

        // Simimarly you can use other conditions like '>=', 'in', 'like', 'and', 'or'

        /*
        // Reading all the posts of the user with the given ID
        $user = User::find(1);
        $posts = $user->posts;
        return $posts;
        */

        /*
        // Reading all the posts with tag names of the user with the given ID
        $user = User::find(1);
        echo $user->name . "<br>";
        $posts = $user->posts;
        foreach ($posts as $post) {
            echo $post->title . " => ";
            foreach ($post->tags as $tag) {
                echo $tag->name . " ";
            }
            echo "<br>";
        }
        */
    }

    function update(Request $request, $id)
    {
        // Updating data into `users` table
        $user = User::find($id)->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);
        return "Data updated successfully";

        /*
        // Or
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->save();
        return "Data updated successfully";
        */
    }

    function delete($id)
    {
        // Deleting data from `users` table
        User::destroy($id);
        return "Data deleted successfully";
    }
}
