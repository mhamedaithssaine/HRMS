<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
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
        // Partagez la variable $unreadNotificationsCount avec toutes les vues
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $unreadNotificationsCount = Auth::user()->unreadNotifications->count();
                $view->with('unreadNotificationsCount', $unreadNotificationsCount);
            } else {
                $view->with('unreadNotificationsCount', 0); // Si l'utilisateur n'est pas connecté
            }
        });
    }
}
