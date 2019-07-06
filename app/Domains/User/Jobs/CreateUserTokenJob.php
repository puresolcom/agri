<?php

namespace App\Domains\User\Jobs;

use Awok\Foundation\Job;
use Carbon\Carbon;
use Firebase\JWT\JWT;

class CreateUserTokenJob extends Job
{
    /**
     * @var \App\Data\Models\User $model
     */
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function handle()
    {
        $token = [
            'username' => $this->model->email,
            'timestamp' => Carbon::now()->getTimestamp(),
        ];

        return JWT::encode($token, config('app.key'));
    }
}