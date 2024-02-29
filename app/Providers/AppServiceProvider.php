<?php

namespace App\Providers;

use App\Repositories\InterFaces\MessagesInterFaces;
use App\Repositories\Interfaces\PostInterface;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use  \App\Repositories\MessagesRepo;
use App\Services\MessagingService;
use App\Services\PostService;
use App\Services\serviceInterFaces\ServicePostInterface;
use App\Services\serviceInterFaces\servicesInterFace;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(MessagesInterFaces::class, MessagesRepo::class);
        $this->app->bind(servicesInterFace::class, MessagingService::class);

        // post
         $this->app->bind(ServicePostInterface::class, PostService::class);
        $this->app->bind(PostInterface::class, \App\Repositories\PostRepo::class);
    }

    public function boot(): void
    {
        Schema::defaultStringLength(191);
    }
}
