<?php

namespace App\Domains\Tractor\Jobs;

use App\Domains\Tractor\Validators\UpdateTractorValidator;
use Awok\Foundation\Job;

class UpdateTractorInputValidateJob extends Job
{

	protected $input;

    public function __construct( array $input )
    {
    	$this->input = $input;
    }

    public function handle( UpdateTractorValidator $validator )
    {
    	return $validator->validate($this->input);
    }
}