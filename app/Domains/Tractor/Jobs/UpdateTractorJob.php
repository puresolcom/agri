<?php

namespace App\Domains\Tractor\Jobs;

use App\Data\Models\Tractor;
use Awok\Foundation\Job;

class UpdateTractorJob extends Job
{

	protected $model;
	protected $input;

    public function __construct( Tractor $model, array $input )
    {
    	$this->model     = $model;
		$this->input     = $input;
    }

    public function handle(  )
    {
    	return $this->model->update($this->input) ? $this->model : false;
    }
}