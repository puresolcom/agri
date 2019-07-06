<?php

namespace App\Http\Controllers;

use Awok\Foundation\Controller;
use App\Features\ListFieldFeature;
use App\Features\GetFieldFeature;
use App\Features\CreateFieldFeature;
use App\Features\UpdateFieldFeature;
use App\Features\DeleteFieldFeature;


class FieldsController extends Controller
{
    public function index()
    {
        return $this->serve(ListFieldFeature::class);
    }

    public function get($id)
    {
        return $this->serve(GetFieldFeature::class, ['objectID' => $id]);
    }

    public function create()
    {
        return $this->serve(CreateFieldFeature::class);
    }

    public function update($id)
    {
        return $this->serve(UpdateFieldFeature::class, ['objectID' => $id]);
    }

    public function delete($id)
    {
        return $this->serve(DeleteFieldFeature::class, ['objectID' => $id]);
    }
}