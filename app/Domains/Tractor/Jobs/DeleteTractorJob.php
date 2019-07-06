<?php

namespace App\Domains\Tractor\Jobs;

use App\Data\Models\Tractor;
use Awok\Foundation\Job;

class DeleteTractorJob extends Job
{

	protected $model;

    public function __construct( Tractor $model )
    {
    	$this->model = $model;
    }

    public function handle(  )
    {
    	return $this->model->delete();
    }
}