<?php

namespace App\Domains\FieldType\Jobs;

use App\Domains\FieldType\Validators\UpdateFieldTypeValidator;
use Awok\Foundation\Job;

class UpdateFieldTypeInputValidateJob extends Job
{

	protected $input;

    public function __construct( array $input )
    {
    	$this->input = $input;
    }

    public function handle( UpdateFieldTypeValidator $validator )
    {
    	return $validator->validate($this->input);
    }
}