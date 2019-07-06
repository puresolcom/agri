<?php

namespace App\Domains\FieldType\Validators;

use Awok\Validation\Validator;

class CreateFieldTypeValidator extends Validator
{
    protected $rules = [
        'name' => 'required|string'
    ];
}
