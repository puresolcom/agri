<?php

namespace App\Domains\User\Jobs;

use Awok\Foundation\Job;

class GetCurrentUserJob extends Job
{
    public function handle()
    {
        return app('authorization')->getUser();
    }
}