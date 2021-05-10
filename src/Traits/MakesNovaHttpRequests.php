<?php

declare(strict_types=1);

namespace Wimski\NovaHttpTests\Traits;

use Illuminate\Foundation\Testing\Concerns\MakesHttpRequests;
use Illuminate\Http\Response;
use Wimski\NovaHttpTests\NovaResponse;

trait MakesNovaHttpRequests
{
    use MakesHttpRequests;

    /**
     * @param string               $uri
     * @param array<string, mixed> $headers
     * @return NovaResponse
     */
    public function get($uri, array $headers = []): NovaResponse
    {
        /** @var NovaResponse $response */
        $response = $this->json('GET', static::getNovaUriPrefix() . $uri, [], $headers);

        return $response;
    }

    /**
     * @param string               $uri
     * @param array<string, mixed> $data
     * @param array<string, mixed> $headers
     * @return NovaResponse
     */
    public function post($uri, array $data = [], array $headers = []): NovaResponse
    {
        /** @var NovaResponse $response */
        $response = $this->json('POST', static::getNovaUriPrefix() . $uri, $data, $headers);

        return $response;
    }

    /**
     * @param string               $uri
     * @param array<string, mixed> $data
     * @param array<string, mixed> $headers
     * @return NovaResponse
     */
    public function put($uri, array $data = [], array $headers = []): NovaResponse
    {
        /** @var NovaResponse $response */
        $response = $this->json('PUT', static::getNovaUriPrefix() . $uri, $data, $headers);

        return $response;
    }

    /**
     * @param string               $uri
     * @param array<string, mixed> $data
     * @param array<string, mixed> $headers
     * @return NovaResponse
     */
    public function delete($uri, array $data = [], array $headers = []): NovaResponse
    {
        /** @var NovaResponse $response */
        $response = $this->json('DELETE', static::getNovaUriPrefix() . $uri, $data, $headers);

        return $response;
    }

    /**
     * @param Response $response
     * @return NovaResponse
     */
    protected function createTestResponse($response): NovaResponse
    {
        return NovaResponse::fromBaseResponse($response);
    }

    protected static function getNovaUriPrefix(): string
    {
        return 'nova-api';
    }

    /**
     * @param array<string, mixed>[] $filters
     * @return string
     */
    protected function formatNovaResourceFiltersQueryString(array $filters): string
    {
        if (empty($filters)) {
            return '';
        }

        return 'filters=' . base64_encode(json_encode($filters));
    }
}
