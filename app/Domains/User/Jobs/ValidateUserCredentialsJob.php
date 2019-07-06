<?php

namespace App\Domains\User\Jobs;

use App\Domains\User\Exceptions\InvalidCredentialsException;
use Awok\Foundation\Job;
use Illuminate\Contracts\Hashing\Hasher;

class ValidateUserCredentialsJob extends Job
{
    /**
     * @var \App\Data\Models\User $model
     */
    protected $model;

    protected $credentials;

    public function __construct($model, $credentials)
    {
        $this->model = $model;
        $this->credentials = $credentials;
    }

    public function handle(Hasher $hasher)
    {
        if (!$hasher->check($this->credentials['password'], $this->model->password)) {
            throw new InvalidCredentialsException();
        }

        return true;
    }
}