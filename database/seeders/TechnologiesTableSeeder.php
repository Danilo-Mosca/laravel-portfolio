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
        $technologies = [
            ['name' => "HTML", 'description' => "Linguaggio di markup usato per strutturare il contenuto delle pagine web."],
            ['name' => "CSS", 'description' => "Linguaggio di stile usato per definire l’aspetto visivo delle pagine web (colori, layout, font...)."],
            ['name' => "JavaScript", 'description' => "Linguaggio di programmazione che rende interattive le pagine web (animazioni, validazione form, ecc.)."],
            ['name' => "PHP", 'description' => "Linguaggio di scripting lato server usato per creare contenuti web dinamici."],
            ['name' => "React", 'description' => "Libreria JavaScript per costruire interfacce utente interattive e componenti riutilizzabili."],
            ['name' => "Node.js", 'description' => "Ambiente di esecuzione per JavaScript sul server, utile per creare backend veloci e scalabili."],
            ['name' => "Laravel", 'description' => "Framework PHP per lo sviluppo di applicazioni web, con focus su eleganza e semplicità."],
        ];

        foreach ($technologies as $technology) {
            $newTechnology = new Technology();

            $newTechnology->name = $technology['name'];
            $newTechnology->color = $faker->hexColor();     //faker ritorna un colore in esadecimale compreso di "#" cancelletto
            $newTechnology->description = $technology['description'];
            $newTechnology->save();     // Salviamo il campo technology appena creato
        }
    }
}
