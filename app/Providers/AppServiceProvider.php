<?php

namespace App\Providers;

use App\Repositories\InterFaces\MessagesInterFaces;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use  \App\Repositories\MessagesRepo;
use App\Services\MessagingService;
use App\Services\serviceInterFaces\servicesInterFace;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(MessagesInterFaces::class,MessagesRepo::class);
        $this->app->bind(MessagingService::class , servicesInterFace::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Schema::defaultStringLength(191);


    }
}
