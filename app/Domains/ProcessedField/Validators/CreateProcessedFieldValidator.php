<?php

namespace App\Domains\ProcessedField\Validators;

use Awok\Validation\Validator;

class CreateProcessedFieldValidator extends Validator
{
    protected $rules = [
        'field_id' => 'required|exists:field_type,id',
        'tractor_id' => 'required|exists:tractor,id',
        'processed_area' => 'required|integer',
    ];
}
