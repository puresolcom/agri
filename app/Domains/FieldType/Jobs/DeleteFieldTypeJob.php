<?php

namespace App\Domains\FieldType\Jobs;

use App\Data\Models\FieldType;
use Awok\Foundation\Job;

class DeleteFieldTypeJob extends Job
{

	protected $model;

    public function __construct( FieldType $model )
    {
    	$this->model = $model;
    }

    public function handle(  )
    {
    	return $this->model->delete();
    }
}