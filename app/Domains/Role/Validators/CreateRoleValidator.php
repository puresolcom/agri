<?php

namespace App\Domains\Role\Validators;

use Awok\Validation\Validator;

class CreateRoleValidator extends Validator
{
    protected $rules = [
        'role' => 'required|unique:role|alpha_dash|min:3|max:32',
        'name' => 'required|string|min:3|max:64',
    ];
}