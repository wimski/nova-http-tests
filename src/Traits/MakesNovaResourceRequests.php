<?php

declare(strict_types=1);

namespace Wimski\NovaHttpTests\Traits;

use Wimski\NovaHttpTests\NovaResponse;

trait MakesNovaResourceRequests
{
    use MakesNovaHttpRequests {
        getNovaUriPrefix as originalGetNovaUriPrefix;
    }

    abstract protected static function getNovaResourceClass(): string;

    protected static function getNovaUriPrefix(): string
    {
        $uriKey = call_user_func([static::getNovaResourceClass(), 'uriKey']);

        return static::originalGetNovaUriPrefix() . '/' . $uriKey;
    }

    /**
     * @param array<string, mixed> $filters
     * @return NovaResponse
     */
    protected function getNovaResources(array $filters = []): NovaResponse
    {
        if (empty($filters)) {
            $filters = $this->getNovaResourceDefaultFilters();
        }

        return $this->get("?{$this->formatNovaResourceFiltersQueryString($filters)}");
    }

    protected function getNovaResourceFilters(): NovaResponse
    {
        return $this->get('/filters');
    }

    /**
     * @param int|string $key
     */
    protected function getNovaResource($key): NovaResponse
    {
        return $this->get("/{$key}");
    }

    protected function getNovaResourceCreationFields(): NovaResponse
    {
        return $this->get('/creation-fields');
    }

    /**
     * @param int|string $key
     */
    protected function getNovaResourceUpdateFields($key): NovaResponse
    {
        return $this->get("/{$key}/update-fields");
    }

    /**
     * @return array<string, mixed>[]
     */
    protected function getNovaResourceDefaultFilters(): array
    {
        $response = $this->getNovaResourceFilters();

        return array_map(function (array $filter) {
            return [
                'class' => $filter['class'],
                'value' => $filter['currentValue'],
            ];
        }, $response->json());
    }
}
