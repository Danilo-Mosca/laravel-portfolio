<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();     // Uso il metodo statica all() dal Model Project per restituire a $projects tutti i dati contenuti nella tabella projects del database laravel-portfolio

        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $newProject = new Project();

        /*
        METODO ALTERNATIVO SE L'ARGOMENTO E' PASSATO CON:   public function store(Request $request)

        $newProject->name = $request['name'];
        $newProject->client = $request['client'];
        $newProject->type = $request['type'];
        // Oppure anche così:
        $newProject->start_date = $request->start_date;
        $newProject->end_date = $request->end_date;
        $newProject->summary = $request->summary;

        $newProject->save();    //salvo i nuovi dati nella tabella projects del database
        */

        $data = $request->all();    //assegno alla variabile $data tutti i valori inseriti nel form
        // dd($data);
        $newProject->name = $data['name'];
        $newProject->client = $data['client'];
        $newProject->type = $data['type'];
        $newProject->start_date = $data['start_date'];
        $newProject->end_date = $data['end_date'];
        $newProject->summary = $data['summary'];
        // dd($newProject);

        $newProject->save();    //salvo i nuovi dati nella tabella projects del database

        // Reindirizzo l'utente alla pagina show per vedere il projects che ha salvato ($newPost->id è equivalente a $newPost))
        return redirect()->route("projects.show", $newProject);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        // Se ho come argomento la stringa dell'id: public function show(string $id)
        // Allora posso ricavare quel singolo elemento con i seguenti modi:

        // $project = Project::where('id', $id)->get();
        // Oppure:
        // $project = Project::where("id", $id)->first();
        // Oppure:
        // $project = Project::find($id);


        // Se ho il Project come argomento (CONSIGLIATO) allora recupero direttamente quel posto così:
        // dd($project);
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
