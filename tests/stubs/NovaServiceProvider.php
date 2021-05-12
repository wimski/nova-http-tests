<?php

declare(strict_types=1);

namespace Wimski\NovaHttpTests\Tests\stubs;

use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    protected function routes(): void
    {
        Nova::routes()
            ->withAuthenticationRoutes()
            ->register();
    }

    protected function resources(): void
    {
        Nova::resources([
            TestResource::class,
        ]);
    }

    protected function gate(): void
    {
        Gate::define('viewNova', function () {
            return true;
        });
    }
}
