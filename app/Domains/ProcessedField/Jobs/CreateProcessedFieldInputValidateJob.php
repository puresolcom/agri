<?php

namespace App\Domains\ProcessedField\Jobs;

use App\Domains\ProcessedField\Validators\CreateProcessedFieldValidator;
use Awok\Foundation\Job;

class CreateProcessedFieldInputValidateJob extends Job
{

	protected $input;

    public function __construct( array $input )
    {
    	$this->input = $input;
    }

    public function handle( CreateProcessedFieldValidator $validator )
    {
    	return $validator->validate($this->input);
    }
}