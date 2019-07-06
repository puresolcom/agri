<?php

namespace App\Domains\ProcessedField\Jobs;

use Awok\Foundation\Job;
use App\Data\Models\Field;

class VerifyProcessedAreaValueJob extends Job
{
    protected $model;
    protected $processedArea;

    public function __construct(Field $model, $processedArea)
    {
        $this->model = $model;
        $this->processedArea = $processedArea;
    }

    public function handle()
    {
        $totalProcessed = 0;
        $currentProcessed = $this->model->processed;
        if (!$currentProcessed->isEmpty()) {
            foreach ($currentProcessed as $processed) {
                $totalProcessed += $processed->processed_area;
            }
        }

        if (($totalProcessed + $this->processedArea) > $this->model->area) {
            throw new \Exception('Max of ' . ($this->model->area - $totalProcessed) . 'KM(s) could be processed');
        }
    }
}
