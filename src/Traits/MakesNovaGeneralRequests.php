<?php

declare(strict_types=1);

namespace Wimski\NovaHttpTests\Traits;

use Wimski\NovaHttpTests\NovaResponse;

trait MakesNovaGeneralRequests
{
    use MakesNovaHttpRequests;

    protected function getNovaSearch(string $query): NovaResponse
    {
        return $this->get("/search?search={$query}");
    }

    protected function getNovaDashboard(string $dashboard): NovaResponse
    {
        return $this->get("/dashboards/{$dashboard}");
    }

    protected function getNovaDashboardCards(string $dashboard): NovaResponse
    {
        return $this->get("/dashboards/cards/{$dashboard}");
    }

    protected function getNovaMetrics(): NovaResponse
    {
        return $this->get('/metrics');
    }

    protected function getNovaMetric(string $metric): NovaResponse
    {
        return $this->get("/metrics/{$metric}");
    }

    protected function getNovaCards(): NovaResponse
    {
        return $this->get('/cards');
    }
}
