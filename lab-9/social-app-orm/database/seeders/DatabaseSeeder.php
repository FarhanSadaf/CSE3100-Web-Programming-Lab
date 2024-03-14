<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Insert into 'users' table using Query Builder
        DB::table('users')->insert([ 
            [ 'name' => 'John Doe', 'email' => 'john@example.com', 'password' => 'password123' ], 
            [ 'name' => 'Alice Smith', 'email' => 'alice@example.com', 'password' => 'securepass' ], 
            [ 'name' => 'Bob Johnson', 'email' => 'bob@example.com', 'password' => 'test123' ]
        ]);

        // Insert into 'profiles' table using Query Builder
        DB::table('profiles')->insert([ 
            ['user_id' => 1, 'bio' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'], 
            ['user_id' => 2, 'bio' => 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'], 
            ['user_id' => 3, 'bio' => 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'] 
        ]);

        // Insert into 'posts' table using Query Builder
        DB::table('posts')->insert([ 
            ['user_id' => 1, 'title' => 'First Post From John Doe', 'content' => 'This is the content of the first post.'], 
            ['user_id' => 1, 'title' => 'Second Post From John Doe', 'content' => 'This is the content of the second post.'], 
            ['user_id' => 2, 'title' => 'First Post From Alice', 'content' => 'This is the content of the first post.'], 
            ['user_id' => 3, 'title' => 'First Post From Bob', 'content' => 'This is the content of the first post.']
        ]);

        // Insert into 'tags' table using Query Builder
        DB::table('tags')->insert([ 
            ['name' => 'Technology'], 
            ['name' => 'Travel'], 
            ['name' => 'Food'] 
        ]);

        // Insert into 'post_tag' table using Query Builder
        DB::table('post_tag')->insert([
            ['post_id' => 1, 'tag_id' => 1],
            ['post_id' => 1, 'tag_id' => 2],
            ['post_id' => 2, 'tag_id' => 2],
            ['post_id' => 3, 'tag_id' => 3],
            ['post_id' => 3, 'tag_id' => 1],
            ['post_id' => 4, 'tag_id' => 3]
        ]);
    }
}
