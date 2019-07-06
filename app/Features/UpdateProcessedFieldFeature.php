<?php

namespace App\Features;

use Awok\Foundation\Feature;
use Awok\Foundation\Http\Request;
use App\Domains\ProcessedField\Jobs\UpdateProcessedFieldInputValidateJob;
use App\Domains\ProcessedField\Jobs\UpdateProcessedFieldInputFilterJob;
use App\Domains\ProcessedField\Jobs\UpdateProcessedFieldJob;
use Awok\Domains\Http\Jobs\JsonResponseJob;
use Awok\Domains\Http\Jobs\JsonErrorResponseJob;
use Awok\Domains\Data\Jobs\FindObjectByIDJob;
use App\Data\Models\ProcessedField;
use App\Operations\UpdateProcessedFieldOperation;

class UpdateProcessedFieldFeature extends Feature
{
	protected $objectID;

	public function __construct(int $objectID)
	{
		$this->objectID = $objectID;
	}

	public function handle(Request $request)
	{
		// Validate Request Inputs
		$this->run(UpdateProcessedFieldInputValidateJob::class, ['input' => $request->all()]);
		// Finding model
		$model = $this->run(FindObjectByIDJob::class,  ['model' => ProcessedField::withoutGlobalScopes(['approved']), 'objectID' => $this->objectID]);

		// Exclude unwanted Inputs
		$filteredInputs = $this->run(UpdateProcessedFieldInputFilterJob::class);

		// Update model
		$updated = $this->run(UpdateProcessedFieldOperation::class, ['model' => $model, 'input' => $filteredInputs]);


		// Response
		if (!$updated) {
			return $this->run(new JsonErrorResponseJob('Unable to update ProcessedField'));
		}

		return $this->run(new JsonResponseJob($updated));
	}
}
