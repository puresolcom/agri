<?php

namespace App\Domains\Field\Validators;

use Awok\Validation\Validator;

class CreateFieldValidator extends Validator
{
    protected $rules = [
        'name' => 'required|string',
        'crop_type_id' => 'required|exists:field_type,id',
        'area' => 'required|integer',
    ];
}
