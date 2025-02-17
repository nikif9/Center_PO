<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\ResourceRepositoryInterface;
use App\Repositories\ResourceRepository;
use App\Repositories\BookingRepositoryInterface;
use App\Repositories\BookingRepository;
use App\Models\Booking;
use App\Observers\BookingObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ResourceRepositoryInterface::class, ResourceRepository::class);
        $this->app->bind(BookingRepositoryInterface::class, BookingRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Booking::observe(BookingObserver::class);
    }
}
