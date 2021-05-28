<?php

namespace App\Providers;

use App\Interfaces\MemeRepositoryInterface;
use App\Repositories\MemeRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(MemeRepositoryInterface::class, MemeRepository::class);
    }
}
