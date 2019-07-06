<?php

namespace App\Domains\Field\Jobs;

use App\Data\Models\Field;
use Awok\Foundation\Job;

class UpdateFieldJob extends Job
{

	protected $model;
	protected $input;

    public function __construct( Field $model, array $input )
    {
    	$this->model     = $model;
		$this->input     = $input;
    }

    public function handle(  )
    {
    	return $this->model->update($this->input) ? $this->model : false;
    }
}