<?php

namespace App\Features;

use Awok\Foundation\Feature;
use Awok\Foundation\Http\Request;
use App\Domains\FieldType\Jobs\UpdateFieldTypeInputValidateJob;
use App\Domains\FieldType\Jobs\UpdateFieldTypeInputFilterJob;
use App\Domains\FieldType\Jobs\UpdateFieldTypeJob;
use Awok\Domains\Http\Jobs\JsonResponseJob;
use Awok\Domains\Http\Jobs\JsonErrorResponseJob;
use Awok\Domains\Data\Jobs\FindObjectByIDJob;
use App\Data\Models\FieldType;

class UpdateFieldTypeFeature extends Feature
{
	protected $objectID;

	public function __construct( int $objectID )
	{
		$this->objectID = $objectID;
	}

    public function handle(Request $request)
    {
        // Validate Request Inputs
		$this->run(UpdateFieldTypeInputValidateJob::class, ['input' => $request->all()]);
		// Finding model
		$model = $this->run(FindObjectByIDJob::class,  ['model' => FieldType::class, 'objectID' => $this->objectID]);

		// Exclude unwanted Inputs
		$filteredInputs = $this->run(UpdateFieldTypeInputFilterJob::class);

		// Update model
		$updated = $this->run(UpdateFieldTypeJob::class, ['model' => $model, 'input' => $filteredInputs]);

		// Response
		if (! $updated) { return $this->run(new JsonErrorResponseJob('Unable to update FieldType')); }

		return $this->run(new JsonResponseJob($updated));
    }
}