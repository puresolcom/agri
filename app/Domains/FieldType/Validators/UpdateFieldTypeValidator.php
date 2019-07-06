<?php

namespace App\Domains\FieldType\Validators;

use Awok\Validation\Validator;

class UpdateFieldTypeValidator extends Validator
{
    protected $rules = [
        'name' => 'required|string'
    ];
}
