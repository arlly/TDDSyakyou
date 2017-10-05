<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(\App\Package\Domain\Booking\BookingRepositoryInterface::class,
                         \App\Package\Infrastructure\Repositories\BookingRepository::class);
        $this->app->bind(\App\Package\Domain\Room\RoomRepositoryInterface::class,
                         \App\Package\Infrastructure\Repositories\RoomRepository::class);
    }
}
