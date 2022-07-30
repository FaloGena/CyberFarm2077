<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalKindsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animal_kinds', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->integer('max_size');
            $table->integer('max_age');
            $table->float('growth_factor');
        });

        // Sample data
        $animalKinds = [
            ['name' => 'cat', 'max_size' => 300, 'max_age' => 10, 'growth_factor' => 1.2],
            ['name' => 'dog', 'max_size' => 500, 'max_age' => 15, 'growth_factor' => 1.4],
            ['name' => 'bird', 'max_size' => 100, 'max_age' => 5, 'growth_factor' => 1.2],
            ['name' => 'elephant', 'max_size' => 700, 'max_age' => 40, 'growth_factor' => 1.1],
        ];

        \App\Models\AnimalKind::insert($animalKinds);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animal_kinds');
    }
}
