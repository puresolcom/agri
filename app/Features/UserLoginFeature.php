<?php

namespace App\Features;

use App\Domains\User\Jobs\LoginValidateJob;
use App\Operations\UserLoginOperation;
use Awok\Domains\Http\Jobs\JsonResponseJob;
use Awok\Foundation\Feature;
use Awok\Foundation\Http\Request;

class UserLoginFeature extends Feature
{
    public function handle(Request $request)
    {
        // Validate
        $this->run(LoginValidateJob::class, ['input' => $request->all()]);
        // Login Job/Operation
        $response = $this->run(UserLoginOperation::class, ['input' => $request->all()]);

        // Response
        return $this->run(new JsonResponseJob($response));
    }
}