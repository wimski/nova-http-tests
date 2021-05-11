<?php

declare(strict_types=1);

namespace Wimski\NovaHttpTests\Tests\stubs;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Field;
use Laravel\Nova\Resource;

class TestResource extends Resource
{
    /**
     * @param Request $request
     * @return Field[]
     */
    public function fields(Request $request): array
    {
        return [];
    }
}
