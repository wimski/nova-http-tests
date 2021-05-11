<?php

declare(strict_types=1);

namespace Wimski\NovaHttpTests\Traits;

use Illuminate\Foundation\Testing\Concerns\MakesHttpRequests;
use Illuminate\Http\Response;
use Wimski\NovaHttpTests\NovaResponse;
use function Safe\json_encode;

trait MakesNovaRequests
{
    use MakesHttpRequests;

    /**
     * @param string               $uri
     * @param array<string, mixed> $headers
     * @return NovaResponse
     */
    public function getNova(string $uri, array $headers = []): NovaResponse
    {
        /** @var NovaResponse $response */
        $response = $this->getJson(static::getNovaUriPrefix() . $uri, $headers);

        return $response;
    }

    /**
     * @param string               $uri
     * @param array<string, mixed> $data
     * @param array<string, mixed> $headers
     * @return NovaResponse
     */
    public function postNova(string $uri, array $data = [], array $headers = []): NovaResponse
    {
        /** @var NovaResponse $response */
        $response = $this->postJson(static::getNovaUriPrefix() . $uri, $data, $headers);

        return $response;
    }

    /**
     * @param string               $uri
     * @param array<string, mixed> $data
     * @param array<string, mixed> $headers
     * @return NovaResponse
     */
    public function putNova(string $uri, array $data = [], array $headers = []): NovaResponse
    {
        /** @var NovaResponse $response */
        $response = $this->putJson(static::getNovaUriPrefix() . $uri, $data, $headers);

        return $response;
    }

    /**
     * @param string               $uri
     * @param array<string, mixed> $data
     * @param array<string, mixed> $headers
     * @return NovaResponse
     */
    public function deleteNova(string $uri, array $data = [], array $headers = []): NovaResponse
    {
        /** @var NovaResponse $response */
        $response = $this->deleteJson(static::getNovaUriPrefix() . $uri, $data, $headers);

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

        /** @var string $data */
        $data = json_encode($filters);

        return 'filters=' . base64_encode($data);
    }
}
