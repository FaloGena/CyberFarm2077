<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimalKind extends Model
{

    protected $table = 'animal_kinds';

    protected $fillable = [
        'name',
        'max_size',
        'max_age',
        'growth_factor'
    ];

    public $timestamps = false;


    public function animals()
    {
        return $this->hasMany(Animal::class, 'animal_kind_id');
    }
}
