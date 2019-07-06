<?php

namespace App\Features;

use App\Data\Models\Field;
use Awok\Foundation\Feature;
use Awok\Foundation\Http\Request;
use Awok\Authorization\Authorization;
use App\Domains\Field\Jobs\UpdateFieldJob;
use Awok\Domains\Http\Jobs\JsonResponseJob;
use Awok\Domains\Data\Jobs\FindObjectByIDJob;
use Awok\Domains\Http\Jobs\JsonErrorResponseJob;
use App\Domains\Field\Jobs\UpdateFieldInputFilterJob;
use App\Domains\Field\Jobs\UpdateFieldInputValidateJob;
use Awok\Authorization\Exceptions\UnauthorizedAccess;

class UpdateFieldFeature extends Feature
{
	protected $objectID;

	public function __construct(int $objectID)
	{
		$this->objectID = $objectID;
	}

	public function handle(Request $request)
	{
		// Validate Request Inputs
		$this->run(UpdateFieldInputValidateJob::class, ['input' => $request->all()]);
		// Finding model
		$model = $this->run(FindObjectByIDJob::class,  ['model' => Field::class, 'objectID' => $this->objectID]);

		// Owner or Admin can only update
		$canUpdate = app('authorization')->capableIf(function (Authorization $auth) use ($model) {
			return ($auth->hasRole('administrator') || $auth->getUser()->id == $model->created_by);
		});

		if (!$canUpdate) {
			throw new UnauthorizedAccess('You don\'t have enough permissions to update this record');
		}

		// Exclude unwanted Inputs
		$filteredInputs = $this->run(UpdateFieldInputFilterJob::class);

		// Update model
		$updated = $this->run(UpdateFieldJob::class, ['model' => $model, 'input' => $filteredInputs]);

		// Response
		if (!$updated) {
			return $this->run(new JsonErrorResponseJob('Unable to update Field'));
		}

		return $this->run(new JsonResponseJob($updated));
	}
}
