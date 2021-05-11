<?php

declare(strict_types=1);

namespace Wimski\NovaHttpTests\Tests\Unit;

use Illuminate\Http\Response;
use Mockery;
use Mockery\MockInterface;
use Wimski\NovaHttpTests\NovaResponse;

class NovaResponseTest extends AbstractUnitTest
{
    protected NovaResponse $test;

    /** @var Response|MockInterface  */
    protected $response;

    protected function setUp(): void
    {
        parent::setUp();

        $this->response = Mockery::mock(Response::class);
        $this->test     = new NovaResponse($this->response);
    }

    /**
     * @test
     */
    public function it_asserts_a_resource_count(): void
    {
        $this->response
            ->shouldReceive('getContent')
            ->andReturn(/** @lang JSON */ '
                {
                  "resources": [
                    {}
                  ]
                }
            ')
            ->getMock();

        $this->test->assertResourceCount(1);
    }

    /**
     * @test
     */
    public function it_asserts_resource_ids(): void
    {
        $this->response
            ->shouldReceive('getContent')
            ->andReturn(/** @lang JSON */ '
                {
                  "resources": [
                    {
                      "id": {
                        "value": 123
                      }
                    },
                    {
                      "id": {
                        "value": 456
                      }
                    }
                  ]
                }
            ')
            ->getMock();

        $this->test->assertResourceIds(123, 456);
    }
}
