<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /* Visualizzo tutti i progetti */
    public function index()
    {
        // prendo tutti i progetti da database:

        // $projects = Project::all();     // mostro solo tutti i progetti, senza le tipologie e/o le tecnologie associati per quel progetto
        $projects = Project::with('type')->get();    // mostro tutti i progetti e le relative tipologie associate
        // $projects = Project::with('type', 'technologies')->get();   // mostro tutti i progetti con le tipologie e tecnologie associati

        // dd($projects);

        return response()->json(
            [
                "success" => true,
                "data" => $projects
            ]
        );
    }

    /* Visualizzo il singolo progetto */
    public function show(Project $project)
    {
        // dd($project);

        // ATTENZIONE: se eseguissi il return direttamente così visualizzerei soltanto i campi dei progetto senza le tipologie e tecnologie.

        // Voglio visualizzare le relazioni con le tabelle tipologie e tecnologie associate per quel progetto, devo richiamare il metodo load():
        $project->load('type', 'technologies');  // così indico che voglio il mio progetto caricato con le tipologie e tecnologie ad esso associati (l'ordine di inserimento non è importante se non per l'ordine in cui verrà visualizzato nel json)   

        return response()->json(
            [
                'success' => true,
                'data' => $project
            ]
        );
    }
}