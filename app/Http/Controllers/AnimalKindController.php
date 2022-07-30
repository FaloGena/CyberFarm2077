<?php

namespace App\Http\Controllers;

use App\Models\AnimalKind;
use Illuminate\Http\Request;

class AnimalKindController extends ApiController
{
    public function index()
    {
        $kinds = AnimalKind::all();

        return $this->makeResponse($kinds);
    }
}
