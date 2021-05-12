<?php

declare(strict_types=1);

namespace Wimski\NovaHttpTests\Tests\stubs;

use Illuminate\Contracts\Foundation\Application;
use Wimski\NovaHttpTests\Traits\MakesNovaResourceRequests;

class UsesMakesNovaResourceRequests
{
    use MakesNovaResourceRequests;

    public Application $app;

    protected static function getNovaResourceClass(): string
    {
        return TestResource::class;
    }
}
