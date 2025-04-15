<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::all();   // Uso il metodo statica all() dal Model Type per restituire a $types tutti i dati contenuti nella tabella types del database laravel-portfolio

        return view('types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // recupero tutti i types dalla sua tabella:
        $types = Type::all();
        return view('types.create', compact('types'));
        // potevo scriverlo anche così:
        // return view('types.create', ['types' => $types]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);

        $newType = new Type();

        /*
        METODO ALTERNATIVO:

        $newType->name = $request['name'];
        $newType->description = $request->description;
        
        $newType->save();    //salvo i nuovi dati nella tabella projects del database
        */

        // Assegno alla variabile $data tutti i valori ricevuto dal form
        $data = $request->all();    //assegno alla variabile $data tutti i valori inseriti nel form
        // dd($data);

        $newType->name = $data['name'];
        $newType->description = $data['description'];

        $newType->save();   //salvo i nuovi dati nella tabella projects del database

        // Reindirizzo l'utente alla pagina show per vedere il projects che ha salvato ($newType->id è equivalente a $newType))
        return redirect()->route('types.show', $newType->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        // Se ho come argomento la stringa dell'id: public function show(string $id)
        // Allora posso ricavare quel singolo elemento con i seguenti modi:

        // $type = type::where('id', $id)->get();
        // Oppure:
        // $type = type::where("id", $id)->first();
        // Oppure:
        // $type = type::find($id);


        // Se ho il type come argomento (CONSIGLIATO) allora recupero direttamente quel posto così:
        // dd($type);
        return view('types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        // dd($id);

        // Alternativa se come argomento del metodo avessi passato:  public function edit(string $id)
        // Così:
        // $type = type::where("id", $id)->get();
        // Oppure in questo modo:
        // $type = type::find($id);
        // dd($type);

        return view("types.edit", compact("type"));
        // Se invece non avessi voluto usare la funzione compact avrei dovuto passare il parametro così:
        // return view("type.edit", ['type' => $type]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        // dd($request);

        // Prima prendiamo le richieste e le salviamo su un array letterale:
        $data = $request->all();

        $type->name = $data['name'];
        $type->description = $data['description'];

        $type->update();     //aggiorno il progetto nel database

        /*
            ANCHE QUI AVREI POTUTO UTILIZZARE:
            public function update(Request $request, string $id)
            {
                Modifichiamo le informazioni contenute nel post:
                $type = Type::find($id);
                $type->name = $request['name'];
                $type->description = $request['description'];
                $type->update();     //aggiorno il progetto nel database
            }
        */

        // Reindirizzo l'utente alla pagina show per vedere il progetto che ha modificato ($type->id è equivalente a $type))
        return redirect()->route("types.show", $type);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        // dd($id);

        /*
            ANCHE QUI AVREI POTUTO UTILIZZARE:
            public function destroy(string $id)
            {
                Modifichiamo le informazioni contenute nel post:
                $type = Type::find($id);
                $type->delete();    //cancello il type
            }
        */

        // Impedisco la cancellazione del tipo di default
        if ($type->id === 1) {
            return back()->with('error', 'Non puoi cancellare il tipo di default');
        }

        // Aggiorno i progetti associati a quel type che sto per cancellare impostandoli con il type di default con id == 1
        Project::where("type_id", $type->id)->update(['type_id' => 1]);

        // Ora posso cancellare il type
        $type->delete();    //cancello il type

        // Reindirizzo l'utente alla pagina index che restituisce tutti i $type contenuti nella tabella $types. Oltre a reindirizzarli nella index, tramite il metodo width() passo anche un dato alla sessione temporanea di tipo "success" con un messaggio "flash" specificato
        return redirect()->route('types.index')->with('success', 'Tipologia di progetto cancellata con successo');
    }
}