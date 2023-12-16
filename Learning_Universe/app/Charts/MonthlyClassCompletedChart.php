<?php

// MonthlyClassCompletedChart.php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class MonthlyClassCompletedChart extends Chart
{
    public function __construct()
    {
        parent::__construct();

        $this->options([
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'ticks' => [
                        'fontColor' => 'red',  // Warna merah untuk label axis y
                    ],
                ],
            ],
        ]);
    }

    public function buildChart($labels, $data, $datasetLabel)
    {
        return $this->dataset($datasetLabel, 'line', $data)
            ->backgroundColor('rgba(255, 0, 0, 0.2)');  // Warna merah untuk isi line
    }
}
