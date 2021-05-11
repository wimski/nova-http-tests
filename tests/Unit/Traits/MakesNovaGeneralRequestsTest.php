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
    protected $test;

    protected function setUp(): void
    {
        parent::setUp();

        $this->test = $this->mockPartial(UsesMakesNovaGeneralRequests::class, ['getNova']);
    }

    /**
     * @test
     */
    public function it_gets_search(): void
    {
        $this->test
            ->shouldReceive('getNova')
            ->with('/search?search=foo')
            ->andReturn(Mockery::mock(NovaResponse::class));

        $this->test->getNovaSearch('foo');
    }

    /**
     * @test
     */
    public function it_gets_a_dashboard(): void
    {
        $this->test
            ->shouldReceive('getNova')
            ->with('/dashboards/foo')
            ->andReturn(Mockery::mock(NovaResponse::class));

        $this->test->getNovaDashboard('foo');
    }

    /**
     * @test
     */
    public function it_gets_dashboard_cards(): void
    {
        $this->test
            ->shouldReceive('getNova')
            ->with('/dashboards/cards/foo')
            ->andReturn(Mockery::mock(NovaResponse::class));

        $this->test->getNovaDashboardCards('foo');
    }

    /**
     * @test
     */
    public function it_gets_metrics(): void
    {
        $this->test
            ->shouldReceive('getNova')
            ->with('/metrics')
            ->andReturn(Mockery::mock(NovaResponse::class));

        $this->test->getNovaMetrics();
    }

    /**
     * @test
     */
    public function it_gets_a_metric(): void
    {
        $this->test
            ->shouldReceive('getNova')
            ->with('/metrics/foo')
            ->andReturn(Mockery::mock(NovaResponse::class));

        $this->test->getNovaMetric('foo');
    }

    /**
     * @test
     */
    public function it_gets_cards(): void
    {
        $this->test
            ->shouldReceive('getNova')
            ->with('/cards')
            ->andReturn(Mockery::mock(NovaResponse::class));

        $this->test->getNovaCards();
    }
}
