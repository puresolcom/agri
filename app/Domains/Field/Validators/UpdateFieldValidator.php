<?php

namespace App\Domains\Field\Validators;

use Awok\Validation\Validator;

class UpdateFieldValidator extends Validator
{
    protected $rules = [
        'name' => 'string',
        'crop_type_id' => 'exists:field_type,id',
        'area' => 'integer',
    ];
}
