<?php

namespace App\Providers;

use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class RedisCacheServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
            $posts = Post::select(['id' , 'title'])->latest()->limit(10)->get() ; 
            // cache limited 10 posts
            $cachedPosts = Cache::remember('read_more_posts' , 3600 , function() use($posts){
                return $posts;
            }) ; 
            
            // get stored posts from cache 
            $posts = Cache::get('read_more_posts') ; 

            // share cached posts for all views 
            View::share([
                'posts' => $posts ,
            ]) ; 
    }
}
