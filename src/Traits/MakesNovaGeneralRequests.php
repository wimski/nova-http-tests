<?php

declare(strict_types=1);

namespace Wimski\NovaHttpTests\Traits;

use Wimski\NovaHttpTests\NovaResponse;

trait MakesNovaGeneralRequests
{
    use MakesNovaRequests;

    public function getNovaSearch(string $query): NovaResponse
    {
        return $this->getNova("/search?search={$query}");
    }

    public function getNovaDashboard(string $dashboard): NovaResponse
    {
        return $this->getNova("/dashboards/{$dashboard}");
    }

    public function getNovaDashboardCards(string $dashboard): NovaResponse
    {
        return $this->getNova("/dashboards/cards/{$dashboard}");
    }

    public function getNovaMetrics(): NovaResponse
    {
        return $this->getNova('/metrics');
    }

    public function getNovaMetric(string $metric): NovaResponse
    {
        return $this->getNova("/metrics/{$metric}");
    }

    public function getNovaCards(): NovaResponse
    {
        return $this->getNova('/cards');
    }
}
