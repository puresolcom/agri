<?php

namespace App\Features;

use App\Data\Models\Field;
use Awok\Foundation\Feature;
use Awok\Foundation\Http\Request;
use Awok\Authorization\Authorization;
use App\Domains\Field\Jobs\DeleteFieldJob;
use Awok\Domains\Http\Jobs\JsonResponseJob;
use Awok\Domains\Data\Jobs\FindObjectByIDJob;
use Awok\Domains\Http\Jobs\JsonErrorResponseJob;
use Awok\Authorization\Exceptions\UnauthorizedAccess;

class DeleteFieldFeature extends Feature
{
	protected $objectID;

	public function __construct(int $objectID)
	{
		$this->objectID = $objectID;
	}

	public function handle(Request $request)
	{
		// Finding model
		$model = $this->run(FindObjectByIDJob::class, ['model' => Field::class, 'objectID' => $this->objectID]);

		// Owner or Admin can only update
		$canDelete = app('authorization')->capableIf(function (Authorization $auth) use ($model) {
			return ($auth->hasRole('administrator') || $auth->getUser()->id == $model->created_by);
		});

		if (!$canDelete) {
			throw new UnauthorizedAccess('You don\'t have enough permissions to update this record');
		}

		// Deleting model
		$deleted = $this->run(DeleteFieldJob::class, ['model' => $model]);

		// Response
		if (!$deleted) {
			return $this->run(new JsonErrorResponseJob('Unable to delete Field'));
		}

		return $this->run(new JsonResponseJob('Field Deleted Successfully'));
	}
}
