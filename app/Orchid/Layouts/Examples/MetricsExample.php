<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Examples;

use Orchid\Screen\Layouts\Metric;

class MetricsExample extends Metric
{
    /**
     * @var string
     */
    protected $title = 'Metric today';

    /**
     * @var string
     */
    protected $target = 'metrics';

    /**
     * @var array
     */
    protected $labels = [
        'Sales Today',
        'Visitors Today',
        'Total Earnings',
        'Pending Orders',
        'Total Revenue',
    ];
}
