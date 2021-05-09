<?php

declare(strict_types=1);

namespace Wimski\NovaHttpTests;

use Illuminate\Testing\TestResponse;

class NovaResponse extends TestResponse
{
    public function assertResourceCount(int $count): self
    {
        $this->assertJsonCount($count, 'resources');

        return $this;
    }

    /**
     * @param int|string ...$id
     * @return $this
     */
    public function assertResourceIds(...$id): self
    {
        $this->assertJson([
            'resources' => array_map(function ($id) {
                return ['id' => ['value' => $id]];
            }, func_get_args()),
        ]);

        return $this;
    }
}
