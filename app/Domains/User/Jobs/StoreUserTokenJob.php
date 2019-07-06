<?php

namespace App\Domains\User\Jobs;

use App\Data\Models\Transient;
use App\Data\Models\User;
use Awok\Foundation\Job;
use Carbon\Carbon;

class StoreUserTokenJob extends Job
{
    protected $model;

    protected $token;

    public function __construct(User $model, $token)
    {
        $this->model = $model;
        $this->token = $token;
    }

    public function handle()
    {
        return Transient::create([
            'type' => 'login_token',
            'key' => $this->model->id,
            'value' => $this->token,
            'expires_at' => Carbon::now()->addDay(1)->toDateTimeString(),
        ]);
    }
}