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
        /*
        $posts = Post::select(['id' , 'title'])->latest()->limit(10)->get() ; 
        if(!Cache::has('read_more_posts'))
        {
            $cachedPosts = Cache::remember('read_more_posts' , 3600 , function() use($posts){
                return $posts;
            }) ; 
            View::share([
                'cachedPosts' => $cachedPosts ,
            ]) ; 
        }
            */
    }
}
