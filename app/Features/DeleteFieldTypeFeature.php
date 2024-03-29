<?php

namespace App\Features;

use Awok\Foundation\Feature;
use Awok\Foundation\Http\Request;
use App\Domains\FieldType\Jobs\DeleteFieldTypeJob;
use Awok\Domains\Data\Jobs\FindObjectByIDJob;
use Awok\Domains\Http\Jobs\JsonResponseJob;
use Awok\Domains\Http\Jobs\JsonErrorResponseJob;
use App\Data\Models\FieldType;

class DeleteFieldTypeFeature extends Feature
{
	protected $objectID;

	public function __construct( int $objectID )
	{
		$this->objectID = $objectID;
	}

    public function handle(Request $request)
    {
        // Finding model
		$model = $this->run(FindObjectByIDJob::class, ['model' => FieldType::class, 'objectID' => $this->objectID]);

		// Deleting model
		$deleted = $this->run(DeleteFieldTypeJob::class, ['model' => $model]);

		// Response
		if (! $deleted) {return $this->run(new JsonErrorResponseJob('Unable to delete FieldType'));}

		return $this->run(new JsonResponseJob('FieldType Deleted Successfully'));
    }
}