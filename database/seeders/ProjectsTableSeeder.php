<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// importo i faker
use Faker\Generator as Faker;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // Il faker importato lo passo come argomento al metodo run():
    public function run(Faker $faker): void
    {
        for ($i=0; $i < 10; $i++) { 
            $newProject = new Project();

            $newProject->name = $faker->sentence(3);     // Genera una frase contenente una data quantità di parole. Di default 6, in questo caso 3
            $newProject->client = $faker->company();     // Potrei inserire anche name() al posto di company()
            $newProject->type = $faker->word();          // Genera una parola, che verrà utilizzata come type del progetto
            $newProject->start_date = $faker->dateTimeBetween('-2 years', '-3 weeks');  // Per la data di inizio progetto richiedo di inserire una data compresa tra 2 anni fa fino a 3 settimane fa
        
            // Assegno la data ad una variabile per evitare poi che la data della fine del progetto sia antecedente a quella di inizio progetto:
            $startDate = $newProject->start_date;
            $startDate->modify('+3 days');      // Calcola almeno 3 giorni dopo la data di inizio
            $newProject->end_date = $faker->dateTimeBetween($startDate, 'now');    // La data di fine progetto sarà quindi una data compresa tra la data di inizio progetto + 3 giorni e la data odierna
            
            $newProject->summary = $faker->paragraph(8);        // Genara 8 paragrafi

            $newProject->save();    // Salviamo il progetto appena creato
        }
    }
}
