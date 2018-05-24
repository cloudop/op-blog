<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
            $catRs = Models\Category::select('id', 'name')->get();
            $category = [];
            if ($catRs) {
                $category = $catRs->toArray();
            }
            View::share('category', $category);
        }
        $aboutMe = [
            'name' => '林 云开',
            'github' => 'https://github.com/cloudop',
            'email' => 'cloudop@gmail.com'
        ];
        View::share('aboutMe', $aboutMe);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
