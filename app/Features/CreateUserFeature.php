<?php

namespace App\Features;

use App\Domains\User\Jobs\CreateUserInputValidateJob;
use App\Operations\CreateUserOperation;
use Awok\Domains\Http\Jobs\JsonErrorResponseJob;
use Awok\Domains\Http\Jobs\JsonResponseJob;
use Awok\Foundation\Feature;
use Awok\Foundation\Http\Request;

class CreateUserFeature extends Feature
{
    public function __construct()
    {

    }

    public function handle(Request $request)
    {
        // Validate Request Inputs
        $this->run(CreateUserInputValidateJob::class, ['input' => $request->all()]);

        $created = $this->run(CreateUserOperation::class);

        // Response
        if (!$created) {
            return $this->run(new JsonErrorResponseJob('Unable to create User'));
        }

        return $this->run(new JsonResponseJob($created));
    }
}