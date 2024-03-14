<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PostController extends Controller
{
    function index($userId) {
        // Get the user from the database
        $user = DB::table('users')->where('id', $userId)->first();

        // Get the posts from the database
        $posts = DB::table('posts')->where('user_id', $userId)->get();

        // Get the tags for each post
        foreach ($posts as $post) {
            $post->tags = DB::table('tags')
                ->join('post_tag', 'tags.id', '=', 'post_tag.tag_id')
                ->where('post_tag.post_id', $post->id)
                ->get();
        }

        // Return the post_index view with the user and posts
        return view('post_list', [
            'user' => $user,
            'posts' => $posts
        ]);
    }

    function create(Request $request, $userId) {
        // Get the tags from the database
        $tags = DB::table('tags')->get();

        // Get the user from the database
        $user = DB::table('users')->where('id', $userId)->first();

        // If the request is a GET request, return the post_create_form view
        if ($request->isMethod('get')) {
            return view('post_create_form', [
                'user' => $user,
                'tags' => $tags
            ]);
        }

        // Otherwise, the request is a POST request
        // Validate the request
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'tags' => 'required'
        ]);

        // Create a new post using Query Builder
        $postId = DB::table('posts')->insertGetId([
            'user_id' => $userId,
            'title' => $request->title,
            'content' => $request->content
        ]);

        // Insert the tags for the post
        foreach ($request->tags as $tagId) {
            DB::table('post_tag')->insert([
                'post_id' => $postId,
                'tag_id' => $tagId
            ]);
        }

        // Return post_list view
        return redirect()->route('post.index', ['userId' => $userId]);
    }

    function update(Request $request, $userId, $postId) {
        // Get the tags from the database
        $tags = DB::table('tags')->get();

        // Get the user from the database
        $user = DB::table('users')->where('id', $userId)->first();

        // Get the post from the database
        $post = DB::table('posts')->where('id', $postId)->first();

        // Get the tags for the post
        $post->tags = DB::table('tags')
            ->join('post_tag', 'tags.id', '=', 'post_tag.tag_id')
            ->where('post_tag.post_id', $post->id)
            ->get();

        // If the request is a GET request, return the post_update_form view
        if ($request->isMethod('get')) {
            return view('post_update_form', [
                'user' => $user,
                'tags' => $tags,
                'post' => $post
            ]);
        }

        // Otherwise, the request is a POST request
        // Validate the request
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'tags' => 'required'
        ]);

        // Update the post using Query Builder
        DB::table('posts')->where('id', $postId)->update([
            'title' => $request->title,
            'content' => $request->content
        ]);

        // Delete the tags for the post
        DB::table('post_tag')->where('post_id', $postId)->delete();

        // Insert the tags for the post
        foreach ($request->tags as $tagId) {
            DB::table('post_tag')->insert([
                'post_id' => $postId,
                'tag_id' => $tagId
            ]);
        }

        // Return post_list view 
        return redirect()->route('post.index', ['userId' => $userId]);
    }

    function delete($userId, $postId) {
        // Delete the post from the database
        DB::table('posts')->where('id', $postId)->delete();

        // Redirect to the post index
        return redirect()->route('post.index', ['userId' => $userId]);
    }
}
