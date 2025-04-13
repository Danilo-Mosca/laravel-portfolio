<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();

            $table->string("name", 40);                 //colonna che conterrà il nome del progetto
            $table->string("client", 40)->nullable();   //colonna che conterrà il cliente, può essere anche null
            $table->date("start_date");              //colonna che conterrà la data di inizio del progetto
            $table->date("end_date");                //colonna che conterrà la data di fine progetto
            $table->longText("summary")->nullable(); //colonna che conterrà un riassunto del progetto, gli do un longText perchè il contenuto dele post deve contenere una stringa con molti caratteri

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
