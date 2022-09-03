<?php

namespace App\Providers;

use App\Models\SettingGroup;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\HttpFoundation\Request;

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
        /* This line set the Cloudflare's IP as a trusted proxy  */
        Request::setTrustedProxies(
            ['REMOTE_ADDR'],
            Request::HEADER_X_FORWARDED_FOR
        );

        if (App::isProduction())
        {
            URL::forceScheme('https');
        }
        Schema::defaultStringLength(191);
        if (Schema::hasTable('setting_groups'))
        {
            $setting_groups = SettingGroup::all();
            View::share('setting_groups', $setting_groups);
        }
    }
}
