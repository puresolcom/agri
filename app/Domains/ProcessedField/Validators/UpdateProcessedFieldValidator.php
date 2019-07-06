<?php

namespace App\Domains\ProcessedField\Validators;

use Awok\Validation\Validator;

class UpdateProcessedFieldValidator extends Validator
{
    protected $rules = [
        'field_id' => 'exists:field_type,id',
        'tractor_id' => 'exists:tractor,id',
        'processed_area' => 'integer',
        'approved' => 'bool'
    ];
}
