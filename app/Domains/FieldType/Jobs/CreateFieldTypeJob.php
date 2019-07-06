<?php

namespace App\Domains\FieldType\Jobs;

use App\Data\Models\FieldType;
use Awok\Foundation\Job;

class CreateFieldTypeJob extends Job
{

	protected $data;

    public function __construct( array $input )
    {
    	$this->data = $input;
    }

    public function handle( FieldType $model )
    {
    	return $model->create($this->data);
    }
}