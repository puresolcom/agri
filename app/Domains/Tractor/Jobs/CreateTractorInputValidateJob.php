<?php

namespace App\Domains\Tractor\Jobs;

use App\Domains\Tractor\Validators\CreateTractorValidator;
use Awok\Foundation\Job;

class CreateTractorInputValidateJob extends Job
{

	protected $input;

    public function __construct( array $input )
    {
    	$this->input = $input;
    }

    public function handle( CreateTractorValidator $validator )
    {
    	return $validator->validate($this->input);
    }
}