<?php

declare(strict_types=1);

namespace Wimski\NovaHttpTests\Tests\Unit;

use Illuminate\Http\Response;
use Mockery;
use Mockery\MockInterface;
use Wimski\NovaHttpTests\NovaResponse;

class NovaResponseTest extends AbstractUnitTest
{
    protected NovaResponse $novaResponse;

    /** @var Response|MockInterface  */
    protected $response;

    protected function setUp(): void
    {
        parent::setUp();

        $this->response     = Mockery::mock(Response::class);
        $this->novaResponse = new NovaResponse($this->response);
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

        $this->novaResponse->assertResourceCount(1);
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

        $this->novaResponse->assertResourceIds(123, 456);
    }
}
