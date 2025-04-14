<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technology;
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
        /* -------- PER POPOLARE IN MODO CASUALE LA TABELLA "projects" CON LE TECNOLOGIE DISPONIBILI PRIMA RECUPERO QUESTE: -------- */
        $technologies = Technology::all();
        
        
        
        
        
        // creo 10 progetti fittizi:
        for ($i = 0; $i < 10; $i++) {
            $newProject = new Project();

            $newProject->name = substr($faker->sentence(3), 0, 40);     // Genera una frase contenente una data quantità di parole. Di default 6, in questo caso 3. con il comando sentence(3), 0, 40) limiti la lunghezza della stringa al massimo accettato dalla colonna del DB perchè è vero che faker->sentece genera una frase con massimo 3 parole, ma siccome sulla migration "2025_04_04_183028_create_projects_table.php" ho l'istruzione: $table->string("name", 40); questo significa che faker genera si massimo 39 caratteri, ma non tiene conto dei punti e degli spazi, così limito la lunghezza della strinca al massimo accettato specificato nella migration.
            $newProject->client = $faker->company();     // Potrei inserire anche name() al posto di company()
            $newProject->type_id = rand(1, 5);            // Genera un numero a caso compreso tra 1 e 5
            // $newProject->type = $faker->word();          // Genera una parola, che verrà utilizzata come type del progetto
            $newProject->start_date = $faker->dateTimeBetween('-2 years', '-3 weeks');  // Per la data di inizio progetto richiedo di inserire una data compresa tra 2 anni fa fino a 3 settimane fa

            // Assegno la data ad una variabile per evitare poi che la data della fine del progetto sia antecedente a quella di inizio progetto:
            $startDate = $newProject->start_date;
            $startDate->modify('+3 days');      // Calcola almeno 3 giorni dopo la data di inizio
            $newProject->end_date = $faker->dateTimeBetween($startDate, 'now');    // La data di fine progetto sarà quindi una data compresa tra la data di inizio progetto + 3 giorni e la data odierna

            $newProject->summary = $faker->paragraph(8);        // Genara 8 paragrafi

            $newProject->save();    // Salviamo il progetto appena creato



            
            
            /* -------- ASSOCIO LE TECNOLOGIE AL PROGETTO INSERENDO CASUALMENTE IN MANIERA RANDOMICA ALLA VARIABILE $randomTechnologies UN VALORE COMPRESO TRA 1 E 7 COME SONO IL NUMERO DI TECNOLOGIE CHE HO INSERITO NEL SEEDER DELLA TABELLA technologies: -------- */
            $randomTechnologies = $technologies->random(rand(1,7));
            // Scrivo all'interno della tabella Ponte utilizzando il metodo attach() passandogli come argomento il valore generato casualmente in precedenza:
            $newProject->technologies()->attach($randomTechnologies);
            /* -------- FINE ASSOCIAZIONE TECNOLOGIE AL SINGOLO PROGETTO -------- */
        }
    }
}
