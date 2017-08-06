<?php

namespace App\Domains\User\Jobs;

use Awok\Domains\Http\Jobs\InputFilterJob;

class CreateUserInputFilterJob extends InputFilterJob
{
    protected $expectedKeys = [
        'first_name',
        'last_name',
        'username',
        'email',
        'password',
    ];
}
