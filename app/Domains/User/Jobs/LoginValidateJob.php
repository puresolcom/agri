<?php

namespace App\Domains\User\Jobs;

use App\Domains\User\Validators\LoginValidator;
use Awok\Foundation\Job;

class LoginValidateJob extends Job
{
    protected $input;

    public function __construct($input)
    {
        $this->input = $input;
    }

    public function handle(LoginValidator $validator)
    {
        return $validator->validate($this->input);
    }
}