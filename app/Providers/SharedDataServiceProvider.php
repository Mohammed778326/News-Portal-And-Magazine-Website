<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use App\Services\Frontend\Posts\Cache\PostCachingService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class SharedDataServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(PostCachingService::class, function () {
            return new PostCachingService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $categories = Category::select('id', 'slug', 'name')
            ->withCount('posts')
            ->with('posts')
            ->orderBy('posts_count', 'desc')
            ->get(); 

        $newCatgories = $categories->take(9); 

        $postCachingService = app(PostCachingService::class);

        $latestCachedPosts = $postCachingService->cache_latest_posts();
        $cachedPosts = $postCachingService->cache_read_more_posts();
        $cached_popular_posts = $postCachingService->cache_popular_posts();

        View::share([
            // share data only
            'categories' => $categories,
            'newCatgories' => $newCatgories , 
            //shared and cached data
            'latestCachedPosts' => $latestCachedPosts,
            'cachedPosts' => $cachedPosts,
            'cachedPopularPosts' => $cached_popular_posts,
        ]);
    }
}
