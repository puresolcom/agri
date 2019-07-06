<?php

namespace App\Domains\User\Validators;

use Awok\Validation\Validator;

class LoginValidator extends Validator
{
    protected $rules = [
        'username' => 'required|email|exists:user,email',
        'password' => 'required|string|min:6|max:32',
    ];
}