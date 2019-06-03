<?php

namespace App\Providers;

use DB;
use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
        Resource::withoutWrapping();

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        \DB::listen(function ($query) {
            $tmp = str_replace('?', '"' . '%s' . '"', $query->sql);
            $tmp = vsprintf($tmp, $query->bindings);
            $tmp = str_replace("\\", "", $tmp);
            \Log::info(' execution time: ' . $query->time . 'ms; ' . $tmp . "\n\n\t");

        });
    }
}
