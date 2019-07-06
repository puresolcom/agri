<?php

namespace App\Domains\Field\Jobs;

use App\Data\Models\Field;
use Awok\Foundation\Job;

class DeleteFieldJob extends Job
{

	protected $model;

    public function __construct( Field $model )
    {
    	$this->model = $model;
    }

    public function handle(  )
    {
    	return $this->model->delete();
    }
}