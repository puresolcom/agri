<?php

namespace App\Features;

use App\Data\Models\User;
use Awok\Domains\Data\Jobs\BuildEloquentQueryFromRequestJob;
use Awok\Domains\Http\Jobs\JsonResponseJob;
use Awok\Foundation\Feature;
use Awok\Foundation\Http\Request;

class ListUserFeature extends Feature
{
    public function __construct()
    {

    }

    public function handle(Request $request)
    {
        $results = $this->run(BuildEloquentQueryFromRequestJob::class, ['model' => User::class]);

        return $this->run(new JsonResponseJob($results));
    }
}