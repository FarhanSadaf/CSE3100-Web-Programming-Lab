<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class QBExerciseController extends Controller
{
    function create(Request $request)
    {
        // Inserting data into `users` table
        DB::table('users')->insert([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);
        return "Data inserted successfully";
    }

    function read(Request $request)
    {
        // Reading data from `users` table
        $users = DB::table('users')->get();
        return $users;

        /*
        // Reading data from `users` table with '=' condition
        $users = DB::table('users')->where('id', 1)->get();
        return $users;
        */

        /*
        // Reading data from `users` table with '>=' condition
        $users = DB::table('users')->where('id', '>=', 2)->get();
        return $users;
        */

        /*
        // Reading data from `users` table with 'in' condition
        $users = DB::table('users')->whereIn('id', [1, 2, 3])->get();
        return $users;
        */

        /*
        // Reading data from `users` table with 'like' condition
        $users = DB::table('users')->where('email', 'like', '%@example%')->get();
        return $users;
        */

        /*
        // Reading data from `users` table with 'and' condition
        $users = DB::table('users')->where('id', 1)->where('email', 'like', '%@example%')->get();
        return $users;
        */

        /*
        // Reading data from `users` table with 'or' condition
        $users = DB::table('users')->where('id', 1)->orWhere('email', 'like', '%@example%')->get();
        return $users;
        */

        /*
        // Reading data from `users` table with 'order by' condition
        $users = DB::table('users')->orderBy('id', 'desc')->get();
        return $users;
        */

        /*
        // Reading all the `posts` of a user from `posts` table
        $posts = DB::table('posts')->where('user_id', 1)->get();
        return $posts;
        */

        /*
        // Or if you want to get all the posts of a user with user details
        $posts = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->where('posts.user_id', 1)
            ->get();
        return $posts;
        */

        /*
        // Or if you want to get all the posts of a user with user details and post tags 
        $posts = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->join('post_tag', 'posts.id', '=', 'post_tag.post_id')
            ->join('tags', 'post_tag.tag_id', '=', 'tags.id')
            ->where('posts.user_id', 1)
            ->get();
        return $posts;
        */

        /*
        // Selecting `user.email`, `post.title`, `tags.name` from the previous query
        $posts = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->join('post_tag', 'posts.id', '=', 'post_tag.post_id')
            ->join('tags', 'post_tag.tag_id', '=', 'tags.id')
            ->where('posts.user_id', 1)
            ->select('users.email', 'posts.title', 'tags.name')
            ->get();
        return $posts;
        */
    }

    function update(Request $request, $id)
    {
        // Updating data into `users` table
        DB::table('users')->where('id', $id)->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);
        return "Data updated successfully";
    }

    function delete($id)
    {
        // Deleting data from `users` table
        DB::table('users')->where('id', $id)->delete();
        return "Data deleted successfully";
    }
}
