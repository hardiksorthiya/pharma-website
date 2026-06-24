<?php

namespace App\Providers;

use App\Models\ProductCategory;
use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFour();

        if ($this->app->environment('local') && ! $this->app->runningInConsole()) {
            $rootUrl = $this->app->make('request')->getSchemeAndHttpHost();

            if ($rootUrl) {
                URL::forceRootUrl($rootUrl);
            }
        }

        View::composer('*', function ($view) {
            $view->with('settings', Setting::current());
        });

        View::composer('layouts.frontend.footer', function ($view) {
            $view->with(
                'footerProductCategories',
                ProductCategory::query()->orderBy('title')->get(['id', 'title', 'slug'])
            );
        });

        View::composer('layouts.frontend.header', function ($view) {
            $view->with(
                'headerProductCategories',
                ProductCategory::query()->orderBy('title')->get(['id', 'title', 'slug', 'image'])
            );
        });
    }
}
