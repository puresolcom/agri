<?php

namespace App\Features;

use App\Data\Models\User;
use Awok\Domains\Data\Jobs\FindEloquentObjectFromRequestJob;
use Awok\Domains\Http\Jobs\JsonResponseJob;
use Awok\Foundation\Feature;
use Awok\Foundation\Http\Request;

class GetUserFeature extends Feature
{
    protected $objectID;

    public function __construct(int $objectID)
    {
        $this->objectID = $objectID;
    }

    public function handle(Request $request)
    {
        $model = $this->run(FindEloquentObjectFromRequestJob::class, ['model' => User::class,
            'objectID' => $this->objectID,
        ]);

        return $this->run(new JsonResponseJob($model));
    }
}