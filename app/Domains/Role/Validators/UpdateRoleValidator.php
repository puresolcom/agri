<?php

namespace App\Domains\Role\Validators;

use Awok\Validation\Validator;

class UpdateRoleValidator extends Validator
{
    protected $rules = [
        'role' => 'unique:role|alpha_dash|min:3|max:32',
        'name' => 'string|min:3|max:64',
    ];
}