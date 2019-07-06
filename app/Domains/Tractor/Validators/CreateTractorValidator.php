<?php

namespace App\Domains\Tractor\Validators;

use Awok\Validation\Validator;

class CreateTractorValidator extends Validator
{
    protected $rules = [
        'name' => 'required|string|min:3|max:64|unique:tractor'
    ];
}
