<?php

namespace App\Domains\Tractor\Jobs;

use App\Data\Models\Tractor;
use Awok\Foundation\Job;

class CreateTractorJob extends Job
{

	protected $data;

    public function __construct( array $input )
    {
    	$this->data = $input;
    }

    public function handle( Tractor $model )
    {
    	return $model->create($this->data);
    }
}