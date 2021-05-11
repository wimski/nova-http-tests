<?php

declare(strict_types=1);

namespace Wimski\NovaHttpTests\Tests\Unit\Traits;

use Mockery;
use Mockery\MockInterface;
use Wimski\NovaHttpTests\Tests\Unit\AbstractUnitTest;

/**
 * @template T
 */
abstract class AbstractTraitTest extends AbstractUnitTest
{
    /**
     * @param class-string<T> $class
     * @param string[]  $methods
     * @return T|MockInterface
     */
    protected function mockPartial(string $class, array $methods)
    {
        $methodsString = implode(',', $methods);

        /** @var T|MockInterface $mock */
        $mock = Mockery::mock("{$class}[{$methodsString}]");

        return $mock;
    }
}
