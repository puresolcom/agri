<?php

namespace App\Domains\ProcessedField\Jobs;

use App\Domains\ProcessedField\Validators\UpdateProcessedFieldValidator;
use Awok\Foundation\Job;

class UpdateProcessedFieldInputValidateJob extends Job
{

	protected $input;

    public function __construct( array $input )
    {
    	$this->input = $input;
    }

    public function handle( UpdateProcessedFieldValidator $validator )
    {
    	return $validator->validate($this->input);
    }
}