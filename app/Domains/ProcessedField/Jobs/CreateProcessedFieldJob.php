<?php

namespace App\Domains\ProcessedField\Jobs;

use App\Data\Models\ProcessedField;
use Awok\Foundation\Job;

class CreateProcessedFieldJob extends Job
{

	protected $data;

    public function __construct( array $input )
    {
    	$this->data = $input;
    }

    public function handle( ProcessedField $model )
    {
    	return $model->create($this->data);
    }
}