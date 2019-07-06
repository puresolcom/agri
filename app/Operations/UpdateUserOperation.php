<?php

namespace App\Operations;

use App\Data\Models\User;
use App\Domains\User\Jobs\CryptPasswordJob;
use App\Domains\User\Jobs\UpdateUserInputFilterJob;
use App\Domains\User\Jobs\UpdateUserJob;
use Awok\Domains\Authorization\Jobs\CapabilityCheckJob;
use Awok\Foundation\Operation;
use Laravel\Lumen\Application;

class UpdateUserOperation extends Operation
{
    /**
     * @var Application $app
     */
    protected $app;

    /**
     * @var \App\Data\Models\User $model
     */
    protected $model;

    /**
     * @var array $filteredInputs
     */
    protected $filteredInputs;

    public function __construct(User $model)
    {
        $this->model = $model;
        $this->filteredInputs = [];
    }

    public function handle(Application $app)
    {
        $this->app = $app;

        $this->run(new CapabilityCheckJob(function ($auth) {
            /**
             * @var \Awok\Authorization\Authorization $auth
             */
            if ($auth->getUser()->id === $this->model->id) {
                return true;
            }

            if ($auth->hasRole('administrator')) {
                return true;
            }

            return false;
        }));

        $this->filteredInputs = $this->run(UpdateUserInputFilterJob::class);

        $this->app->make('db')->beginTransaction();

        if (isset($this->filteredInputs['password'])) {
            $this->filteredInputs['password'] = $this->run(CryptPasswordJob::class, [
                'password' => $this->filteredInputs['password'],
            ]);
        }

        $updateUser = $this->run(UpdateUserJob::class, ['model' => $this->model, 'input' => $this->filteredInputs]);

        $this->app->make('db')->commit();

        return $updateUser;
    }
}