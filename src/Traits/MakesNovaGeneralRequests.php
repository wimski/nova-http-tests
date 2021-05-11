<?php

declare(strict_types=1);

namespace Wimski\NovaHttpTests\Traits;

use Wimski\NovaHttpTests\NovaResponse;

trait MakesNovaGeneralRequests
{
    use MakesNovaRequests;

    protected function getNovaSearch(string $query): NovaResponse
    {
        return $this->getNova("/search?search={$query}");
    }

    protected function getNovaDashboard(string $dashboard): NovaResponse
    {
        return $this->getNova("/dashboards/{$dashboard}");
    }

    protected function getNovaDashboardCards(string $dashboard): NovaResponse
    {
        return $this->getNova("/dashboards/cards/{$dashboard}");
    }

    protected function getNovaMetrics(): NovaResponse
    {
        return $this->getNova('/metrics');
    }

    protected function getNovaMetric(string $metric): NovaResponse
    {
        return $this->getNova("/metrics/{$metric}");
    }

    protected function getNovaCards(): NovaResponse
    {
        return $this->getNova('/cards');
    }
}
