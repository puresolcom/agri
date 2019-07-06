<?php

namespace App\Operations;

use Awok\Foundation\Operation;
use App\Data\Models\ProcessedField;
use App\Domains\User\Jobs\GetCurrentUserJob;
use App\Domains\ProcessedField\Jobs\UpdateProcessedFieldJob;
use App\Domains\ProcessedField\Jobs\VerifyProcessedAreaValueJob;

class UpdateProcessedFieldOperation extends Operation
{
    protected $model;
    protected $input;

    public function __construct(ProcessedField $model, array $input)
    {
        $this->model = $model;
        $this->finalData = $input;
    }

    public function handle()
    {
        if ($this->model->approved) {
            throw new \Exception('Cannot update an already approved processed area');
        }
        if (isset($this->finalData['approved']) && $this->finalData['approved']) {
            $processedArea = $this->model->processed_area;
            if (isset($this->finalData['processed_area'])) {
                $processedArea = $this->finalData['processed_area'];
            }
            $this->run(VerifyProcessedAreaValueJob::class, ['model' => $this->model->field, 'processedArea' => $processedArea]);
            $currentLoggedInUser = $this->run(GetCurrentUserJob::class);
            $this->finalData['approved_by'] = $currentLoggedInUser->id;
        }

        return $this->run(UpdateProcessedFieldJob::class, ['model' => $this->model, 'input' => $this->finalData]);
    }
}
