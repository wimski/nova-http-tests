<?php

declare(strict_types=1);

namespace Wimski\NovaHttpTests\Tests\stubs;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as BaseUser;

class User extends BaseUser
{
    use HasFactory;

    protected static function newFactory(): Factory
    {
        return new UserFactory();
    }
}
