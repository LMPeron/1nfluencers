<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Sanctum\PersonalAccessToken;
use Illuminate\Foundation\AliasLoader;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        $loader = AliasLoader::getInstance();
        
        $loader->alias(
            \Laravel\Sanctum\PersonalAccessToken::class,
            \App\Models\Sanctum\PersonalAccessToken::class
        );
    }
}
