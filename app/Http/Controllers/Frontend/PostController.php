<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show_post($slug)
    {
        $post = Post::with(['images', 'category'])->whereSlug($slug)->first();
        
        $relatedPosts = Post::with('images')
            ->where('category_id', $post->category->id)
            ->latest()
            ->limit(5)
            ->get();
            
        return view('frontend.post.show', compact('post', 'relatedPosts'));
    }
}
