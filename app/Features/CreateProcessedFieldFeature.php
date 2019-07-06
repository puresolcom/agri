<?php

namespace App\Features;

use Awok\Foundation\Feature;
use Awok\Foundation\Http\Request;
use App\Domains\ProcessedField\Jobs\CreateProcessedFieldInputValidateJob;
use App\Domains\ProcessedField\Jobs\CreateProcessedFieldInputFilterJob;
use App\Domains\ProcessedField\Jobs\CreateProcessedFieldJob;
use Awok\Domains\Http\Jobs\JsonResponseJob;
use Awok\Domains\Http\Jobs\JsonErrorResponseJob;
use App\Operations\CreateProcessedFieldOperation;

class CreateProcessedFieldFeature extends Feature
{


	public function __construct()
	{ }

	public function handle(Request $request)
	{
		// Validate Request Inputs
		$this->run(CreateProcessedFieldInputValidateJob::class, ['input' => $request->all()]);

		// Exclude unwanted Inputs
		$filteredInputs = $this->run(CreateProcessedFieldInputFilterJob::class);

		// Create model
		$created = $this->run(CreateProcessedFieldOperation::class, ['input' => $filteredInputs]);

		// Response
		if (!$created) {
			return $this->run(new JsonErrorResponseJob('Unable to create ProcessedField'));
		}

		return $this->run(new JsonResponseJob($created));
	}
}
