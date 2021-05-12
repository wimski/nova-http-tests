<?php

declare(strict_types=1);

namespace Wimski\NovaHttpTests\Tests\Unit\Traits;

use Mockery;
use Mockery\MockInterface;
use Wimski\NovaHttpTests\NovaResponse;
use Wimski\NovaHttpTests\Tests\stubs\UsesMakesNovaGeneralRequests;

/**
 * @extends AbstractTraitTest<UsesMakesNovaGeneralRequests>
 */
class MakesNovaGeneralRequestsTest extends AbstractTraitTest
{
    /**
     * @var UsesMakesNovaGeneralRequests|MockInterface
     */
    protected $trait;

    protected function setUp(): void
    {
        parent::setUp();

        $this->trait = $this->mockPartial(UsesMakesNovaGeneralRequests::class, ['getNova']);
    }

    /**
     * @test
     */
    public function it_gets_search(): void
    {
        $this->trait
            ->shouldReceive('getNova')
            ->with('/search?search=foo')
            ->andReturn(Mockery::mock(NovaResponse::class));

        $this->trait->getNovaSearch('foo');
    }

    /**
     * @test
     */
    public function it_gets_a_dashboard(): void
    {
        $this->trait
            ->shouldReceive('getNova')
            ->with('/dashboards/foo')
            ->andReturn(Mockery::mock(NovaResponse::class));

        $this->trait->getNovaDashboard('foo');
    }

    /**
     * @test
     */
    public function it_gets_dashboard_cards(): void
    {
        $this->trait
            ->shouldReceive('getNova')
            ->with('/dashboards/cards/foo')
            ->andReturn(Mockery::mock(NovaResponse::class));

        $this->trait->getNovaDashboardCards('foo');
    }

    /**
     * @test
     */
    public function it_gets_metrics(): void
    {
        $this->trait
            ->shouldReceive('getNova')
            ->with('/metrics')
            ->andReturn(Mockery::mock(NovaResponse::class));

        $this->trait->getNovaMetrics();
    }

    /**
     * @test
     */
    public function it_gets_a_metric(): void
    {
        $this->trait
            ->shouldReceive('getNova')
            ->with('/metrics/foo')
            ->andReturn(Mockery::mock(NovaResponse::class));

        $this->trait->getNovaMetric('foo');
    }

    /**
     * @test
     */
    public function it_gets_cards(): void
    {
        $this->trait
            ->shouldReceive('getNova')
            ->with('/cards')
            ->andReturn(Mockery::mock(NovaResponse::class));

        $this->trait->getNovaCards();
    }
}
