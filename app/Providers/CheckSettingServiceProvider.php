<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\ServiceProvider;

class CheckSettingServiceProvider extends ServiceProvider
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
        Setting::firstOr(function(){
            return Setting::create([
                'site_name' => 'Laravel News' , 
                'favicon' => 'default' , 
                'logo' => 'default' ,
                'facebook' => 'defult' ,
                'twitter' => 'default' ,
                'instagram' => 'default' ,
                'youtube' => 'default' ,
                'country' => 'default' ,
                'city' => 'default' ,
                'street' => 'default' ,
                'email' => 'default' , 
                'phone' => 'default', 
            ]) ; 
        }) ; 
    }
}
