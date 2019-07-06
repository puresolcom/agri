<?php

namespace App\Domains\User\Jobs;

use App\Data\Models\User;
use Awok\Foundation\Job;

class ActivateUserJob extends Job
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function handle()
    {
        $this->model->active = 1;

        return $this->model->saveOrFail();
    }
}