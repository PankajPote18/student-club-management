<?php

namespace App\Providers;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{    
    public function register()
    {
        $this->app->bind(
            \App\Repositories\StudentRepositoryInterface::class,
            \App\Repositories\StudentRepository::class
        );
    }
    public function boot(): void
    {
        Paginator::useBootstrap();
    }
}
