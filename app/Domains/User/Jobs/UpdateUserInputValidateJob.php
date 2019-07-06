<?php

namespace App\Domains\User\Jobs;

use App\Domains\User\Validators\UpdateUserValidator;
use Awok\Foundation\Job;

class UpdateUserInputValidateJob extends Job
{
    protected $input;

    protected $currentUserID;

    public function __construct(array $input, $currentUserID)
    {
        $this->input = $input;
        $this->currentUserID = $currentUserID;
    }

    public function handle(UpdateUserValidator $validator)
    {
        return $validator->validate($this->input, [
            'name' => 'string|min:3|max:64',
            'email' => "email|unique:user,email,{$this->currentUserID}",
            'phone_number' => 'alpha_num|min:9|max:14',
            'password' => 'string|min:6|max:32',
            'active' => 'boolean',
            'roles' => 'array',
        ]);
    }
}