<?php

namespace App\Providers;

// use Illuminate\Contracts\Pagination\Paginator;

use App\Services\ParserService;
use App\Services\SocialService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Services\Interfaces\Parser;
use App\Services\Interfaces\Social;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Parser::class, ParserService::class);
        $this->app->bind(Social::class, SocialService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
