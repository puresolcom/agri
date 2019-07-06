<?php

namespace App\Domains\User\Validators;

use Awok\Validation\Validator;

class CreateUserValidator extends Validator
{
    protected $rules = [
        'name' => 'required|string|min:3|max:64',
        'email' => 'required|email|unique:user',
        'phone_number' => 'alpha_num|min:9|max:14',
        'password' => 'required|string|min:6|max:32',
    ];
}