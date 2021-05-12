<?php

declare(strict_types=1);

namespace Wimski\NovaHttpTests\Tests\Unit\Traits;

use Mockery;
use Mockery\MockInterface;
use Wimski\NovaHttpTests\NovaResponse;
use Wimski\NovaHttpTests\Tests\stubs\UsesMakesNovaResourceRequests;
use function Safe\json_encode;

/**
 * @extends AbstractTraitTest<UsesMakesNovaResourceRequests>
 */
class MakesNovaResourceRequestsTest extends AbstractTraitTest
{
    /**
     * @var UsesMakesNovaResourceRequests|MockInterface
     */
    protected $trait;

    protected function setUp(): void
    {
        parent::setUp();

        $this->trait = $this->mockPartial(UsesMakesNovaResourceRequests::class, [
            'getNova',
            'postNova',
            'putNova',
            'deleteNova',
        ]);
    }

    /**
     * @test
     */
    public function it_gets_resources_with_filters(): void
    {
        $filters = base64_encode(json_encode([
            [
                'class' => 'SomeClass',
                'value' => 'some-value',
            ],
        ]));

        $this->trait
            ->shouldReceive('getNova')
            ->with('?filters=' . $filters)
            ->andReturn(Mockery::mock(NovaResponse::class));

        $this->trait->getNovaResources([
            [
                'class' => 'SomeClass',
                'value' => 'some-value',
            ],
        ]);
    }

    /**
     * @test
     */
    public function it_gets_resources_with_default_filters(): void
    {
        $filters = base64_encode(json_encode([
            [
                'class' => 'SomeClass',
                'value' => 'some-value',
            ],
        ]));

        /** @var NovaResponse|MockInterface $response */
        $response = Mockery::mock(NovaResponse::class)
            ->shouldReceive('json')
            ->andReturn([
                [
                    'class'        => 'SomeClass',
                    'currentValue' => 'some-value',
                ],
            ])
            ->getMock();

        $this->trait
            ->shouldReceive('getNova')
            ->with('/filters')
            ->andReturn($response);

        $this->trait
            ->shouldReceive('getNova')
            ->with('?filters=' . $filters)
            ->andReturn(Mockery::mock(NovaResponse::class));

        $this->trait->getNovaResources();
    }

    /**
     * @test
     */
    public function it_gets_resource_filters(): void
    {
        $this->trait
            ->shouldReceive('getNova')
            ->with('/filters')
            ->andReturn(Mockery::mock(NovaResponse::class));

        $this->trait->getNovaResourceFilters();
    }

    /**
     * @test
     */
    public function it_gets_a_resource(): void
    {
        $this->trait
            ->shouldReceive('getNova')
            ->with('/key')
            ->andReturn(Mockery::mock(NovaResponse::class));

        $this->trait->getNovaResource('key');
    }

    /**
     * @test
     */
    public function it_gets_resource_creation_fields(): void
    {
        $this->trait
            ->shouldReceive('getNova')
            ->with('/creation-fields')
            ->andReturn(Mockery::mock(NovaResponse::class));

        $this->trait->getNovaResourceCreationFields();
    }

    /**
     * @test
     */
    public function it_gets_resource_update_fields(): void
    {
        $this->trait
            ->shouldReceive('getNova')
            ->with('/key/update-fields')
            ->andReturn(Mockery::mock(NovaResponse::class));

        $this->trait->getNovaResourceUpdateFields('key');
    }
}
