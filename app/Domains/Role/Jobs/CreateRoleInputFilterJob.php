<?php

namespace App\Domains\Role\Jobs;

use Awok\Domains\Http\Jobs\InputFilterJob;
use Awok\Foundation\Http\Request;

class CreateRoleInputFilterJob extends InputFilterJob
{
    protected $expectedKeys = [
        'role',
        'name',
    ];

    public function __construct(array $expectedKeys = [])
    {
        parent::__construct($expectedKeys);
    }

    public function handle(Request $request)
    {
        return parent::handle($request);
    }
}