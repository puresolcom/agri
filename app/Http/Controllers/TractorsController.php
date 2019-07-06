<?php

namespace App\Http\Controllers;

use Awok\Foundation\Controller;
use App\Features\ListTractorFeature;
use App\Features\GetTractorFeature;
use App\Features\CreateTractorFeature;
use App\Features\UpdateTractorFeature;
use App\Features\DeleteTractorFeature;


class TractorsController extends Controller
{
    public function index()
    {
        return $this->serve(ListTractorFeature::class);
    }

    public function get($id)
    {
        return $this->serve(GetTractorFeature::class, ['objectID' => $id]);
    }

    public function create()
    {
        return $this->serve(CreateTractorFeature::class);
    }

    public function update($id)
    {
        return $this->serve(UpdateTractorFeature::class, ['objectID' => $id]);
    }

    public function delete($id)
    {
        return $this->serve(DeleteTractorFeature::class, ['objectID' => $id]);
    }
}