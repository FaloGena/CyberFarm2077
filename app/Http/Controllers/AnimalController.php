<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnimalAgeRequest;
use App\Http\Requests\AnimalCreateRequest;
use App\Models\Animal;
use App\Models\AnimalKind;
use App\Repositories\AnimalRepository;
use App\Traits\AnimalTrait;

class AnimalController extends ApiController
{
    use AnimalTrait;

    public function index()
    {
        $animals = (new AnimalRepository(Animal::class))->getForDisplay();

        // Wanna calculate current sizes right away
        $sizes = $this->calculateSizesForCollection($animals);

        return $this->makeResponse(compact('animals', 'sizes'));
    }

    public function show(Animal $animal)
    {
        return $this->makeResponse(['animal' => $animal, 'size' => $animal->calculateSize()]);
    }

    public function create(AnimalCreateRequest $request)
    {
        if (Animal::count() >= 4)
            return $this->makeResponse([], 422, 'Reached the maximum amount of animals');


        // kind_id here, but could be extended to any parameter to find
        $requestedKind = $request->get('kind');

        $kind = AnimalKind::find($requestedKind);

        if (!$kind)
            return $this->makeResponse($requestedKind, 422, 'No such kind of animals');

        // Could also move somewhere to make easier to expand
        $animal = $kind->animals()->create();

        if (!$animal)
            return $this->makeResponse($kind, 500, 'For some reason animal was not created');


        return $this->makeResponse(['animal' => $animal, 'size' => $animal->calculateSize(), 'maxAge' => $kind->max_age]);
    }

    public function update(AnimalAgeRequest $request)
    {
        // Same situation with ID here
        $requestedAnimal = $request->get('animal');

        $animal = Animal::find($requestedAnimal);

        if (!$animal)
            return $this->makeResponse($requestedAnimal, 404, 'No such animal existing');

        if ($animal->age >= $animal->kind->max_age)
            return $this->makeResponse($requestedAnimal, 422, 'Growed to the maximum age of its kind');

        $size = $this->ageAnimal($animal);

        return $this->makeResponse(compact('animal', 'size'));
    }

    public function deleteAll()
    {
        // Same about expanding
        $status = Animal::query()->delete();

        if (!$status)
            return $this->makeResponse([], 500, 'For some reason animals were not deleted');

        return $this->makeResponse('deleted');
    }
}
