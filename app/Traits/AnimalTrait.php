<?php


namespace App\Traits;


use App\Models\Animal;
use Illuminate\Support\Collection;

trait AnimalTrait
{

    /**
     * Return array of calculated sizes for Animal collection
     * No modifications on origin Animal instances
     *
     * @param Collection<Animal> Animal $animals
     * @return array
     */
    public function calculateSizesForCollection(Collection $animals)
    {
        $sizes = [];
        $animals->map(function ($el) use(&$sizes) {
            $sizes[] = $el->calculateSize();
        });

        return $sizes;
    }

    /**
     * Increase Animal's age by 1 and return size for new age
     *
     * @param Animal $animal
     * @return float|int
     */
    public function ageAnimal(Animal $animal)
    {
        $animal->age += 1;
        $animal->save();

        return $animal->calculateSize();
    }
}
