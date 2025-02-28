<?php

namespace App\Providers;

use App\Interfaces\AuthServiceInterface;
use App\Services\SocialAuth\GoogleAuthService;
use Illuminate\Support\ServiceProvider;
use InvalidArgumentException;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AuthServiceInterface::class , function($app){
           $provider = request()->route('provider') ; 
           switch($provider)
           {
                case 'google' : 
                    return new GoogleAuthService() ; 
                default : 
                    throw new InvalidArgumentException('Unsupported Provider : ' . $provider) ; 
           }
        }) ; 
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
