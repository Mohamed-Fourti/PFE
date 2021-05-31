<?php

namespace App\Providers;

use App\Models\FichedevœuxOF;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\{ Blade, View, Route };

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
        View::composer('AdminPanel.layout', function ($view) {
            $title = config('titles.' . Route::currentRouteName());
            $view->with(compact('title'));
        });
        View::composer('layouts.app', function($view){
            $FichedevœuxOF=FichedevœuxOF::where('Active','1')->first();
            $view->with('FichedevœuxOF',$FichedevœuxOF);
        });
    }
}
