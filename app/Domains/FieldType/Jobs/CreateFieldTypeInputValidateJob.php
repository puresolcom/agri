<?php

namespace App\Domains\FieldType\Jobs;

use App\Domains\FieldType\Validators\CreateFieldTypeValidator;
use Awok\Foundation\Job;

class CreateFieldTypeInputValidateJob extends Job
{

	protected $input;

    public function __construct( array $input )
    {
    	$this->input = $input;
    }

    public function handle( CreateFieldTypeValidator $validator )
    {
    	return $validator->validate($this->input);
    }
}