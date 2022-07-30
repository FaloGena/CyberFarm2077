<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnimalAgeRequest;
use App\Http\Requests\AnimalCreateRequest;
use App\Models\Animal;

class AnimalController extends Controller
{
    public function index()
    {
        return 'index';
    }

    public function show(Animal $animal)
    {
        return 'show';
    }

    public function create(AnimalCreateRequest $request)
    {
        return 'create';
    }

    public function update(AnimalAgeRequest $request)
    {
        return 'update';
    }

    public function deleteAll()
    {
        $status = Animal::query()->delete();

        if (!$status)
            return 'For some reason not deleted';

        return 'deleted';
    }
}
