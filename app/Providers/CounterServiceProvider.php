<?php

declare(strict_types=1);

namespace App\Providers;

use App\Repositories\Counter\CounterRepository;
use App\Repositories\Counter\CounterRepositoryInterface;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class CounterServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CounterRepositoryInterface::class, CounterRepository::class);
    }

    public function provides()
    {
        //
    }

}
