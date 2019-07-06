<?php

namespace App\Domains\ProcessedField\Jobs;

use Awok\Domains\Http\Jobs\InputFilterJob;
use Awok\Foundation\Http\Request;

class CreateProcessedFieldInputFilterJob extends InputFilterJob
{

    protected $expectedKeys = [
        'field_id',
        'tractor_id',
        'processed_area'
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
