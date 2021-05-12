<?php

declare(strict_types=1);

namespace Wimski\NovaHttpTests\Tests\stubs;

use Orchestra\Testbench\Factories\UserFactory as BaseUserFactory;

class UserFactory extends BaseUserFactory
{
    protected $model = User::class;
}
