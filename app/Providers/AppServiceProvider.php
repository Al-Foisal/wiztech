<?php

namespace App\Providers;

use App\Models\SiteInfo;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //website settings
        $site = SiteInfo::find(1);
        view()->share(['site' => $site]);
    }
}
