<?php

declare(strict_types=1);

namespace Wimski\NovaHttpTests\Tests\stubs;

use Illuminate\Contracts\Foundation\Application;
use Wimski\NovaHttpTests\Traits\MakesNovaGeneralRequests;

class UsesMakesNovaGeneralRequests
{
    use MakesNovaGeneralRequests;

    public Application $app;
}
