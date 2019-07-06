<?php

namespace App\Operations;

use App\Domains\User\Jobs\CreateUserTokenJob;
use App\Domains\User\Jobs\FindUserByEmail;
use App\Domains\User\Jobs\StoreUserTokenJob;
use App\Domains\User\Jobs\ValidateUserCredentialsJob;
use Awok\Foundation\Operation;

class UserLoginOperation extends Operation
{
    protected $input;

    public function __construct($input)
    {
        $this->input = $input;
    }

    public function handle()
    {
        $user = $this->run(FindUserByEmail::class, ['email' => $this->input['username']]);

        $this->run(ValidateUserCredentialsJob::class, ['model' => $user, 'credentials' => $this->input]);

        $token = $this->run(CreateUserTokenJob::class, ['model' => $user]);

        $this->run(StoreUserTokenJob::class, ['model' => $user, 'token' => $token]);

        return array_merge(['authorization_token' => $token], ['user' => $user->toArray()]);
    }
}