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
        Schema::table('projects', function (Blueprint $table) {
            //rimuoviamo la colonna type
            $table->dropColumn("type");
            // aggiungiamo la colonna "type_id" e la constrain
            $table->foreignId("type_id")->after("client")->default(1)->constrained();   //ALLA FOREIGN KEY BISOGNA NECESSARIAMENTE DARE O UN VALORE DI DEFAULT (COME 1 IN QUESTO CASO) OPPURE SPECIFICARE CHE LA COLONNA PUO' ESSERE NULLABLE CON IL METODO: nullable()
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // Ricreo la colonna "type" cancellata nel metodo up()
            $table->string("type", 20)->after('client');     //aggiungo la colonna type di 20 caratteri

            // eliminiamo la constrain
            $table->dropForeign("projects_type_id_foreign");    //cancello il vincolo applicato alla chiave esterna specificando: nomeTabella_nomeColonna_foreign
            $table->dropColumn("type_id");      //droppo, cioè cancello la colonna "type_id" creata nel metodo up()
        });
    }
};