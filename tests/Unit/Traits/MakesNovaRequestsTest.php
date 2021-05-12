<?php

declare(strict_types=1);

namespace Wimski\NovaHttpTests\Tests\Unit\Traits;

use Mockery;
use Mockery\MockInterface;
use Wimski\NovaHttpTests\NovaResponse;
use Wimski\NovaHttpTests\Tests\stubs\UsesMakesNovaRequests;

/**
 * @extends AbstractTraitTest<UsesMakesNovaRequests>
 */
class MakesNovaRequestsTest extends AbstractTraitTest
{
    /**
     * @var UsesMakesNovaRequests|MockInterface
     */
    protected $trait;

    protected function setUp(): void
    {
        parent::setUp();

        $this->trait = $this->mockPartial(UsesMakesNovaRequests::class, [
            'getJson',
            'postJson',
            'putJson',
            'deleteJson',
        ]);
    }

    /**
     * @test
     */
    public function it_makes_a_get_request(): void
    {
        $this->trait
            ->shouldReceive('getJson')
            ->with('nova-api/foo', ['key' => 'value'])
            ->andReturn(Mockery::mock(NovaResponse::class));

        $this->trait->getNova('/foo', ['key' => 'value']);
    }

    /**
     * @test
     */
    public function it_makes_a_post_request(): void
    {
        $this->trait
            ->shouldReceive('postJson')
            ->with('nova-api/foo', ['data' => 'item'], ['key' => 'value'])
            ->andReturn(Mockery::mock(NovaResponse::class));

        $this->trait->postNova('/foo', ['data' => 'item'], ['key' => 'value']);
    }

    /**
     * @test
     */
    public function it_makes_a_put_request(): void
    {
        $this->trait
            ->shouldReceive('putJson')
            ->with('nova-api/foo', ['data' => 'item'], ['key' => 'value'])
            ->andReturn(Mockery::mock(NovaResponse::class));

        $this->trait->putNova('/foo', ['data' => 'item'], ['key' => 'value']);
    }

    /**
     * @test
     */
    public function it_makes_a_delete_request(): void
    {
        $this->trait
            ->shouldReceive('deleteJson')
            ->with('nova-api/foo', ['data' => 'item'], ['key' => 'value'])
            ->andReturn(Mockery::mock(NovaResponse::class));

        $this->trait->deleteNova('/foo', ['data' => 'item'], ['key' => 'value']);
    }
}
