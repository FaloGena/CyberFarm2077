<?php


namespace App\Repositories;


class AnimalRepository extends BaseRepository
{

    public function __construct(string $modelClass)
    {
        parent::__construct($modelClass);
    }

    public function getForDisplay()
    {
        return $this->model::all();
    }
}
