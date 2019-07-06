<?php

namespace App\Http\Controllers;

use Awok\Foundation\Controller;
use App\Features\ListFieldTypeFeature;
use App\Features\GetFieldTypeFeature;
use App\Features\CreateFieldTypeFeature;
use App\Features\UpdateFieldTypeFeature;
use App\Features\DeleteFieldTypeFeature;


class FieldTypesController extends Controller
{
    public function index()
    {
        return $this->serve(ListFieldTypeFeature::class);
    }

    public function get($id)
    {
        return $this->serve(GetFieldTypeFeature::class, ['objectID' => $id]);
    }

    public function create()
    {
        return $this->serve(CreateFieldTypeFeature::class);
    }

    public function update($id)
    {
        return $this->serve(UpdateFieldTypeFeature::class, ['objectID' => $id]);
    }

    public function delete($id)
    {
        return $this->serve(DeleteFieldTypeFeature::class, ['objectID' => $id]);
    }
}