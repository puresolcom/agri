<?php

namespace App\Domains\Tractor\Jobs;

use Awok\Domains\Http\Jobs\InputFilterJob;
use Awok\Foundation\Http\Request;

class UpdateTractorInputFilterJob extends InputFilterJob
{

    protected $expectedKeys = [
        'name'
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
