<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
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
        // recupero tutti i types dalla sua tabella:
        $types = Type::all();
        return view('projects.create', compact('types'));
        // potevo scriverlo anche così:
        // return view('projects.create', ['types' => $types]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $newProject = new Project();

        /*
        METODO ALTERNATIVO:

        $newProject->name = $request['name'];
        $newProject->client = $request['client'];
        $newProject->type_id = $request['type_id'];
        // Oppure anche così:
        $newProject->start_date = $request->start_date;
        $newProject->end_date = $request->end_date;
        $newProject->summary = $request->summary;

        $newProject->save();    //salvo i nuovi dati nella tabella projects del database
        */

        // Assegno alla variabile $data tutti i valori ricevuto dal form
        $data = $request->all();    //assegno alla variabile $data tutti i valori inseriti nel form
        // dd($data);
        $newProject->name = $data['name'];
        $newProject->client = $data['client'];
        $newProject->type_id = $data['type_id'];
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
    public function edit(Project $project)
    {
        // dd($id);

        // Alternativa se come argomento del metodo avessi passato:  public function edit(string $id)
        // Così:
        // $project = Project::where("id", $id)->get();
        // Oppure in questo modo:
        // $project = Project::find($id);
        // dd($project);


        // recupero tutti i types dalla sua tabella:
        $types = Type::all();

        return view("projects.edit", compact("project", "types"));
        // Se invece non avessi voluto usare la funzione compact avrei dovuto passare i parametri così:
        // return view("projects.edit", ['project' => $project]);
        // return view('posts.edit', ['project'=> $project, "types" => $types]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        // dd($request);

        // Prima prendiamo le richieste e le salviamo su un array letterale:
        $data = $request->all();


        $project->name = $data['name'];
        $project->client = $data['client'];
        $project->type_id = $data['type_id'];
        $project->start_date = $data['start_date'];
        $project->end_date = $data['end_date'];
        $project->summary = $data['summary'];
        $project->update();     //aggiorno il progetto nel database

        /*
            ANCHE QUI AVREI POTUTO UTILIZZARE:
            public function update(Request $request, string $id)
            {
            Modifichiamo le informazioni contenute nel post:
            $project = Project::find($id);
            $project->name = $request['name'];
            $project->client = $request['client'];
            $project->type_id = $request['type_id'];
            $project->start_date = $request['start_date'];
            $project->end_date = $request['end_date'];
            $project->summary = $request['summary'];
            $project->update();     //aggiorno il progetto nel database
            }
        */


        // Reindirizzo l'utente alla pagina show per vedere il progetto che ha modificato ($project->id è equivalente a $project))
        return redirect()->route("projects.show", $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        // dd($id);

        $project->delete();    //cancello il progetto

        // Reindirizzo l'utente alla pagina index che restituisce tutti i $project contenuti nella tabella $projects. Oltre a reindirizzarli nella index, tramite il metodo width() passo anche un dato alla sessione temporanea di tipo "success" con un messaggio "flash" specificato
        return redirect()->route('projects.index')->with('success', 'Progetto cancellato con successo');
    }
}
