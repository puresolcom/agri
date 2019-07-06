<?php

namespace App\Domains\Field\Jobs;

use App\Domains\Field\Validators\UpdateFieldValidator;
use Awok\Foundation\Job;

class UpdateFieldInputValidateJob extends Job
{

	protected $input;

    public function __construct( array $input )
    {
    	$this->input = $input;
    }

    public function handle( UpdateFieldValidator $validator )
    {
    	return $validator->validate($this->input);
    }
}