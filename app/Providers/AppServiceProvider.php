<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\ServiceProvider;
use Symfony\Component\HttpKernel\CacheClearer\ChainCacheClearer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(User::class, function () {
            return new User;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
        Paginator::useBootstrapFive();

        // \Debugbar::enable();

        Cache::forget('topUsers');

        View::composer(['layouts.nav'], function ($view) {
            $view->with('user', auth()->user());
        });

        $topUsers = Cache::remember('topUsers', now()->addDays(4)->addHours(5) , function(){
            return User::withCount('ideas')->orderby('ideas_count', 'DESC')->limit(5)->get();
        });

        // Cache::flush();

        View::share('topUsers', $topUsers);

        // App::setLocale('ar');
    }
}
