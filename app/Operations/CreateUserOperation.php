<?php

namespace App\Operations;

use App\Domains\User\Jobs\ActivateUserJob;
use App\Domains\User\Jobs\CreateUserInputFilterJob;
use App\Domains\User\Jobs\CreateUserJob;
use App\Domains\User\Jobs\CryptPasswordJob;
use Awok\Foundation\Operation;
use Laravel\Lumen\Application;

class CreateUserOperation extends Operation
{
    /**
     * @var \Laravel\Lumen\Application $app
     */
    protected $app;

    /**
     * @var array
     */
    protected $filteredInputs;

    public function __construct()
    {
        $this->filteredInputs = [];
    }

    public function handle(Application $app)
    {
        $this->app = $app;
        $this->app->make('db')->beginTransaction();

        $this->filteredInputs = $this->run(CreateUserInputFilterJob::class);

        $this->filteredInputs['password'] = $this->run(CryptPasswordJob::class, ['password' => $this->filteredInputs['password']]);

        $created = $this->run(CreateUserJob::class, ['input' => $this->filteredInputs]);

        $this->run(ActivateUserJob::class, ['model' => $created]);

        $this->app->make('db')->commit();

        return $created;
    }
}