<?php


namespace App\Traits;


use App\Models\Animal;
use Illuminate\Support\Collection;

trait AnimalTrait
{

    /**
     * @param Collection<Animal> Animal $animals
     */
    public function calculateSizesForCollection(Collection $animals)
    {
        $sizes = [];
        $animals->map(function ($el) use(&$sizes) {
            $sizes[] = $el->calculateSize();
        });

        return $sizes;
    }

    public function ageAnimal(Animal $animal)
    {
        $animal->age += 1;
        $animal->save();

        return $animal->calculateSize();
    }
}
