<?php

namespace App\Operations;

use Awok\Foundation\Operation;
use App\Domains\Field\Jobs\CreateFieldJob;
use App\Domains\User\Jobs\GetCurrentUserJob;

class CreateFieldOperation extends Operation
{
    protected $finalData;

    public function __construct(array $input)
    {
        $this->finalData = $input;
    }

    public function handle()
    {
        $currentLoggedInUser = $this->run(GetCurrentUserJob::class);
        $this->finalData['created_by'] = $currentLoggedInUser->id;

        return $this->run(CreateFieldJob::class, ['input' => $this->finalData]);
    }
}
