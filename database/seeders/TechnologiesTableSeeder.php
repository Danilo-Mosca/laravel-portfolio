<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// importo i faker
use Faker\Generator as Faker;

class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    // Il faker importato lo passo come argomento al metodo run():
    public function run(Faker $faker): void
    {
        $technologies = ["HTML", "CSS", "JavaScript", "PHP", "React", "Node.js", "Laravel"];

        foreach ($technologies as $technology) {
            $newTechnology = new Technology();

            $newTechnology->name = $technology;
            $newTechnology->color = $faker->hexColor();     //faker ritorna un colore in esadecimale compreso di "#" cancelletto

            $newTechnology->save();     // Salviamo il campo technology appena creato
        }
    }
}
