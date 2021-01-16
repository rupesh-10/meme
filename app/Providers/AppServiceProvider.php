<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Carbon::macro('shorterDiffForHumans', static function () {
            $diff = self::this()->diffForHumans(...func_get_args());
            return strtr($diff, ['second' => 'sec', 'minute' => 'min', 'hour' => 'hr']);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
