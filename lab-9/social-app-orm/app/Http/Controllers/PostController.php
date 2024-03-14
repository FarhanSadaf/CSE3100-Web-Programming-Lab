<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tag;
use App\Models\Post;

class PostController extends Controller
{
    function index($userId)
    {
        // Get the user with the given ID
        $user = User::find($userId);

        // Get the posts of the user
        $posts = $user->posts;
        
        // Return the view with the posts
        return view('post_list', [
            'user' => $user,
            'posts' => $posts
        ]);
    }

    function create(Request $request, $userId)
    {
        // Get the user with the given ID
        $user = User::find($userId);

        // Get the tags
        $tags = Tag::all();

        // If the request method is GET
        if ($request->isMethod('get')) {
            // Return the view to create a new post
            return view('post_create_form', [
                'user' => $user,
                'tags' => $tags
            ]);
        }

        // Otherwise, if the request method is POST
        // Validate the request data
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'tags' => 'required|array'
        ]);

        // Create a new post
        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = $userId;
        $post->save();

        // Attach the tags to the post
        $post->tags()->attach($request->tags);

        // Redirect to the post list
        return redirect()->route('post.index', ['userId' => $userId]);
    }
    
    function update(Request $request, $userId, $postId)
    {
        // Get the user with the given ID
        $user = User::find($userId);

        // Get the tags
        $tags = Tag::all();

        // Get the post with the given ID
        $post = Post::find($postId);

        // If the request method is GET
        if ($request->isMethod('get')) {
            // Return the view to update the post
            return view('post_update_form', [
                'user' => $user,
                'tags' => $tags,
                'post' => $post
            ]);
        }

        // Otherwise, if the request method is POST
        // Validate the request data
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'tags' => 'required|array'
        ]);

        // Update the post
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        // Sync the tags of the post
        $post->tags()->sync($request->tags);

        // Redirect to the post list
        return redirect()->route('post.index', ['userId' => $userId]);
    }

    function delete($userId, $postId)
    {
        // Get the post with the given ID
        $post = Post::find($postId);

        // Delete the post
        $post->delete();

        // Redirect to the post list
        return redirect()->route('post.index', ['userId' => $userId]);
    }
}
