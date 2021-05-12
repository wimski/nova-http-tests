<?php

declare(strict_types=1);

namespace Wimski\NovaHttpTests\Tests\stubs;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestModel extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
    ];

    protected static function newFactory(): Factory
    {
        return new TestModelFactory();
    }
}
