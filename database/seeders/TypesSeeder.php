<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Importo i fakeer
use Faker\Generator as Faker;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    // Passo come argomento alla funzione/metodo run() una variabile di tipo Faker:
    public function run(Faker $faker): void
    {
        // Creo un array contenente le tipologie dei progetti e una breve descrizione per ciascuno:
        $types = [
            [
                'name' => "Tipologia non definita",
                'description' => "Tipologia di default per i progetti che non hanno una chiara e definita tipologia"
            ],
            [
                'name' => "Sito vetrina / Portfolio",
                'description' => "Un sito semplice per presentare un’azienda, un professionista o un artista. Include sezioni come “Chi siamo”, “Servizi”, “Contatti” e magari un modulo di contatto."
            ],
            [
                'name' => "Web app interattiva",
                'description' => "Applicazioni vere e proprie che permettono agli utenti di interagire con il contenuto, eseguire operazioni, salvare dati, ecc. Esempi: to-do list, gestionali, sistemi di prenotazione."
            ],
            [
                'name' => "E-commerce",
                'description' => "Siti per la vendita di prodotti o servizi online. Richiedono funzionalità di carrello, checkout, pagamenti sicuri, gestione inventario."
            ],
            [
                'name' => "Blog o piattaforma editoriale",
                'description' => "Sistema dove vengono pubblicati articoli, notizie, contenuti multimediali. Utile per content marketing o community."
            ],
            [
                'name' => "Single Page Application (SPA)",
                'description' => "Un’applicazione che carica una singola pagina HTML e aggiorna dinamicamente i contenuti senza ricaricare la pagina. È una forma moderna e molto usata per app performanti e fluide."
            ],
        ];

        foreach ($types as $type) {
            $newTypes = new Type();

            $newTypes->name = $type['name'];
            $newTypes->description = $type['description'];

            $newTypes->save();      // Salviamo il post appena creato
        }
    }
}
