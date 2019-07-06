<?php

namespace App\Domains\FieldType\Jobs;

use App\Data\Models\FieldType;
use Awok\Foundation\Job;

class UpdateFieldTypeJob extends Job
{

	protected $model;
	protected $input;

    public function __construct( FieldType $model, array $input )
    {
    	$this->model     = $model;
		$this->input     = $input;
    }

    public function handle(  )
    {
    	return $this->model->update($this->input) ? $this->model : false;
    }
}