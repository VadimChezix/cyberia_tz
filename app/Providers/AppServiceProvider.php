<?php

namespace App\Providers;
use App\Models\Author;
use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

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
    //     Gate::define('update-author',function (User $user, Author $author){
    //         return $user->tokens === $author->user->tokens;
    //    });
    }
}
