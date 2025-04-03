<?php

namespace App\Providers\Ilumukita;

use App\Repositories\Ilumukita\Interfaces\IlumukitaUserInterface;
use App\Repositories\Ilumukita\IlumukitaUserRepository;
use Illuminate\Support\ServiceProvider;

class IlumukitaUserProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IlumukitaUserInterface::class, IlumukitaUserRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
