<?php

namespace App\Domains\ProcessedField\Jobs;

use App\Data\Models\ProcessedField;
use Awok\Foundation\Job;

class UpdateProcessedFieldJob extends Job
{

	protected $model;
	protected $input;

    public function __construct( ProcessedField $model, array $input )
    {
    	$this->model     = $model;
		$this->input     = $input;
    }

    public function handle(  )
    {
    	return $this->model->update($this->input) ? $this->model : false;
    }
}