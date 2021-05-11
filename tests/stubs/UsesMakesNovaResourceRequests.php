<?php

declare(strict_types=1);

namespace Wimski\NovaHttpTests\Tests\stubs;

use Wimski\NovaHttpTests\Traits\MakesNovaResourceRequests;

class UsesMakesNovaResourceRequests
{
    use MakesNovaResourceRequests;

    protected static function getNovaResourceClass(): string
    {
        return TestResource::class;
    }
}
