<?php

namespace App\Features;

use App\Data\Models\User;
use App\Domains\User\Jobs\UpdateUserInputValidateJob;
use App\Operations\UpdateUserOperation;
use Awok\Domains\Data\Jobs\FindObjectByIDJob;
use Awok\Domains\Http\Jobs\JsonErrorResponseJob;
use Awok\Domains\Http\Jobs\JsonResponseJob;
use Awok\Foundation\Feature;
use Awok\Foundation\Http\Request;

class UpdateUserFeature extends Feature
{
    protected $objectID;

    public function __construct(int $objectID)
    {
        $this->objectID = $objectID;
    }

    public function handle(Request $request)
    {
        // Validate Request Inputs
        $this->run(UpdateUserInputValidateJob::class, ['input' => $request->all(), 'currentUserID' => $this->objectID]);
        // Finding model
        $model = $this->run(FindObjectByIDJob::class, ['model' => User::class, 'objectID' => $this->objectID]);

        // Update model
        $updated = $this->run(UpdateUserOperation::class, ['model' => $model]);

        // Response
        if (!$updated) {
            return $this->run(new JsonErrorResponseJob('Unable to update User'));
        }

        return $this->run(new JsonResponseJob($updated));
    }
}