<?php

namespace App\Domains\Field\Jobs;

use Awok\Domains\Http\Jobs\InputFilterJob;
use Awok\Foundation\Http\Request;

class UpdateFieldInputFilterJob extends InputFilterJob
{

    protected $expectedKeys = [
        'name', 'crop_type_id', 'area'
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
