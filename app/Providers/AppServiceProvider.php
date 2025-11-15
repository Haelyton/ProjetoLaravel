<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Strategy\CameraFilterContext;
use App\Services\Strategy\ByBrandStrategy;
use App\Services\Strategy\ByResolutionStrategy;
use App\CQRS\Handlers\CreateCameraHandler;
use App\CQRS\Handlers\GetCamerasHandler;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
public function register()
{
    $this->app->singleton(CameraFilterContext::class, function ($app) {
        $context = new CameraFilterContext();
        $context->register('marca', new ByBrandStrategy());
        $context->register('resolucao', new ByResolutionStrategy());
        return $context;
    });

    // Handlers
    $this->app->bind(CreateCameraHandler::class, CreateCameraHandler::class);
    $this->app->bind(GetCamerasHandler::class, GetCamerasHandler::class);

    // Camera Factory
    $this->app->bind(
        \App\Contracts\CameraFactoryInterface::class,
        \App\Factories\CameraFactory::class
    );
}


    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
