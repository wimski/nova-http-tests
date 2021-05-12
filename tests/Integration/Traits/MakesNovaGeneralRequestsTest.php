<?php

declare(strict_types=1);

namespace Wimski\NovaHttpTests\Tests\Integration\Traits;

use Wimski\NovaHttpTests\Tests\Integration\AbstractIntegrationTest;
use Wimski\NovaHttpTests\Tests\stubs\TestModel;
use Wimski\NovaHttpTests\Tests\stubs\UsesMakesNovaGeneralRequests;

class MakesNovaGeneralRequestsTest extends AbstractIntegrationTest
{
    protected UsesMakesNovaGeneralRequests $trait;

    protected function setUp(): void
    {
        parent::setUp();

        $this->trait = new UsesMakesNovaGeneralRequests();

        $this->trait->app = $this->app;
    }

    /**
     * @test
     */
    public function it_gets_search(): void
    {
        TestModel::factory()->create([
            'id'    => 123,
            'title' => 'Foo Bar!',
        ]);

        $this->trait->getNovaSearch('foo')->assertJson([
            [
                'resourceName' => 'test-resources',
                'resourceId'   => 123,
                'title'        => 'Foo Bar!',
            ],
        ]);
    }
}
