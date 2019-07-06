<?php

namespace App\Features;

use Awok\Foundation\Feature;
use Awok\Foundation\Http\Request;
use App\Domains\Tractor\Jobs\CreateTractorInputValidateJob;
use App\Domains\Tractor\Jobs\CreateTractorInputFilterJob;
use App\Domains\Tractor\Jobs\CreateTractorJob;
use Awok\Domains\Http\Jobs\JsonResponseJob;
use Awok\Domains\Http\Jobs\JsonErrorResponseJob;

class CreateTractorFeature extends Feature
{
	

	public function __construct(  )
	{
		
	}

    public function handle(Request $request)
    {
        // Validate Request Inputs
		$this->run(CreateTractorInputValidateJob::class, ['input' => $request->all()]);

		// Exclude unwanted Inputs
		$filteredInputs = $this->run(CreateTractorInputFilterJob::class);

		// Create model
		$created = $this->run(CreateTractorJob::class, ['input' => $filteredInputs]);

		// Response
		if (! $created) { return $this->run(new JsonErrorResponseJob('Unable to create Tractor')); }

		return $this->run(new JsonResponseJob($created));
    }
}