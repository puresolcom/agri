<?php

namespace App\Features;

use Awok\Foundation\Feature;
use Awok\Foundation\Http\Request;
use App\Domains\Field\Jobs\CreateFieldInputValidateJob;
use App\Domains\Field\Jobs\CreateFieldInputFilterJob;
use Awok\Domains\Http\Jobs\JsonResponseJob;
use Awok\Domains\Http\Jobs\JsonErrorResponseJob;
use App\Operations\CreateFieldOperation;

class CreateFieldFeature extends Feature
{


	public function __construct()
	{ }

	public function handle(Request $request)
	{
		// Validate Request Inputs
		$this->run(CreateFieldInputValidateJob::class, ['input' => $request->all()]);

		// Exclude unwanted Inputs
		$filteredInputs = $this->run(CreateFieldInputFilterJob::class);

		// Create model
		$created = $this->run(CreateFieldOperation::class, ['input' => $filteredInputs]);

		// Response
		if (!$created) {
			return $this->run(new JsonErrorResponseJob('Unable to create Field'));
		}

		return $this->run(new JsonResponseJob($created));
	}
}
