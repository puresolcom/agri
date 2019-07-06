<?php

namespace App\Features;

use App\Data\Models\Role;
use Awok\Domains\Data\Jobs\BuildEloquentQueryFromRequestJob;
use Awok\Domains\Http\Jobs\JsonResponseJob;
use Awok\Foundation\Feature;
use Awok\Foundation\Http\Request;

class ListRoleFeature extends Feature
{
    public function __construct()
    {

    }

    public function handle(Request $request)
    {
        $results = $this->run(BuildEloquentQueryFromRequestJob::class, ['model' => Role::class]);

        return $this->run(new JsonResponseJob($results));
    }
}