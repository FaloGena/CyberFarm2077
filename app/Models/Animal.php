<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = [
        'animal_kind_id'
    ];

    public $timestamps = false;


    public function kind()
    {
        return $this->belongsTo(AnimalKind::class, 'animal_kind_id');
    }

    /**
     * Get size for current age
     * Based on parameters of its kind
     *
     * @return float|int
     */
    public function calculateSize()
    {
        $kind = $this->kind;

        $max_age = $kind->max_age;
        $max_size = $kind->max_size;
        $growth_factor = $kind->growth_factor;

        $current_age = $this->age;

        return $max_size / (pow($growth_factor, $max_age - $current_age));
    }
}
