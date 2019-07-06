<?php

namespace App\Operations;

use Awok\Foundation\Operation;
use App\Domains\User\Jobs\GetCurrentUserJob;
use App\Domains\ProcessedField\Jobs\CreateProcessedFieldJob;
use App\Domains\ProcessedField\Jobs\VerifyProcessedAreaValueJob;
use Awok\Domains\Data\Jobs\FindObjectByIDJob;
use App\Data\Models\Field;

class CreateProcessedFieldOperation extends Operation
{
    const DEFAULT_APPROVAL_VALUE = false;

    protected $finalData;

    public function __construct($input)
    {
        $this->finalData = $input;
    }

    public function handle()
    {
        $field = $this->run(FindObjectByIDJob::class, ['model' => Field::class, 'objectID' => $this->finalData['field_id']]);
        $this->run(VerifyProcessedAreaValueJob::class, ['model' => $field, 'processedArea' => $this->finalData['processed_area']]);
        $currentLoggedInUser = $this->run(GetCurrentUserJob::class);
        $this->finalData['created_by'] = $currentLoggedInUser->id;
        $this->finalData['approved'] = self::DEFAULT_APPROVAL_VALUE;
        return $this->run(CreateProcessedFieldJob::class, ['input' => $this->finalData]);
    }
}
