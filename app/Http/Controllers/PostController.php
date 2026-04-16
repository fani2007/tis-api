<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function createPost(Request $request)
    {
        $post = Post::create([
            'content' => $request->input('content'),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'New post created',
            'data' => ['post' => $post]
        ]);
    }

    public function getPostById($id)
    {
        $post = Post::find($id);
        
        return response()->json([
            'success' => true,
            'message' => 'Post grabbed',
            'data' => [
                'post' => [
                    'id' => $post->id,
                    'content' => $post->content,
                    'comments' => $post->comments,
                ]
                    
            ]        
                    
        ]);
    }

    public function addTag($id, $tagId)
    {
        $post = Post::find($id);
        $post->tags()->attach($tagId);
        return response()->json([
            'success' => true,
            'message' => 'Tag added to post',  
        ]);
    }
}
