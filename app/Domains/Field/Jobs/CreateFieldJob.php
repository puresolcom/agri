<?php

namespace App\Domains\Field\Jobs;

use App\Data\Models\Field;
use Awok\Foundation\Job;

class CreateFieldJob extends Job
{

	protected $data;

    public function __construct( array $input )
    {
    	$this->data = $input;
    }

    public function handle( Field $model )
    {
    	return $model->create($this->data);
    }
}