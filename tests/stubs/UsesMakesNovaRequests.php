<?php

declare(strict_types=1);

namespace Wimski\NovaHttpTests\Tests\stubs;

use Illuminate\Contracts\Foundation\Application;
use Wimski\NovaHttpTests\Traits\MakesNovaRequests;

class UsesMakesNovaRequests
{
    use MakesNovaRequests;

    public Application $app;
}
