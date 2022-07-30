<?php


namespace App\Repositories;


class BaseRepository
{
    protected $model;

    public function __construct(string $modelClass)
    {
        $this->model = $modelClass;
    }
}
