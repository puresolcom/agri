<?php

namespace App\Features;

use Awok\Foundation\Feature;
use Awok\Foundation\Http\Request;
use App\Domains\FieldType\Jobs\CreateFieldTypeInputValidateJob;
use App\Domains\FieldType\Jobs\CreateFieldTypeInputFilterJob;
use App\Domains\FieldType\Jobs\CreateFieldTypeJob;
use Awok\Domains\Http\Jobs\JsonResponseJob;
use Awok\Domains\Http\Jobs\JsonErrorResponseJob;

class CreateFieldTypeFeature extends Feature
{
	

	public function __construct(  )
	{
		
	}

    public function handle(Request $request)
    {
        // Validate Request Inputs
		$this->run(CreateFieldTypeInputValidateJob::class, ['input' => $request->all()]);

		// Exclude unwanted Inputs
		$filteredInputs = $this->run(CreateFieldTypeInputFilterJob::class);

		// Create model
		$created = $this->run(CreateFieldTypeJob::class, ['input' => $filteredInputs]);

		// Response
		if (! $created) { return $this->run(new JsonErrorResponseJob('Unable to create FieldType')); }

		return $this->run(new JsonResponseJob($created));
    }
}