<?php

namespace App\Domains\Field\Jobs;

use App\Domains\Field\Validators\CreateFieldValidator;
use Awok\Foundation\Job;

class CreateFieldInputValidateJob extends Job
{

	protected $input;

    public function __construct( array $input )
    {
    	$this->input = $input;
    }

    public function handle( CreateFieldValidator $validator )
    {
    	return $validator->validate($this->input);
    }
}