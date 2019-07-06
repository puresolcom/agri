<?php

namespace App\Http\Controllers;

use Awok\Foundation\Controller;
use App\Features\ListProcessedFieldFeature;
use App\Features\GetProcessedFieldFeature;
use App\Features\CreateProcessedFieldFeature;
use App\Features\UpdateProcessedFieldFeature;
use App\Features\DeleteProcessedFieldFeature;


class ProcessedFieldsController extends Controller
{
    public function index()
    {
        return $this->serve(ListProcessedFieldFeature::class);
    }

    public function get($id)
    {
        return $this->serve(GetProcessedFieldFeature::class, ['objectID' => $id]);
    }

    public function create()
    {
        return $this->serve(CreateProcessedFieldFeature::class);
    }

    public function update($id)
    {
        return $this->serve(UpdateProcessedFieldFeature::class, ['objectID' => $id]);
    }

    public function delete($id)
    {
        return $this->serve(DeleteProcessedFieldFeature::class, ['objectID' => $id]);
    }
}