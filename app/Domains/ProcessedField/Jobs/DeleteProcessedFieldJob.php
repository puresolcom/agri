<?php

namespace App\Domains\ProcessedField\Jobs;

use App\Data\Models\ProcessedField;
use Awok\Foundation\Job;

class DeleteProcessedFieldJob extends Job
{

	protected $model;

    public function __construct( ProcessedField $model )
    {
    	$this->model = $model;
    }

    public function handle(  )
    {
    	return $this->model->delete();
    }
}