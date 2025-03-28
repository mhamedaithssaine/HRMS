<?php 

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        // Partager le nombre de notifications non lues avec toutes les vues
        view()->composer('*', function ($view) {
            if (Auth::check()) {
                $unreadNotificationsCount = Auth::user()->unreadNotifications->count();
                $view->with('unreadNotificationsCount', $unreadNotificationsCount);
            }
        });
    }
}