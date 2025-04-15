<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = Technology::all();   // Uso il metodo statica all() dal Model Technology per restituire a $technologies tutti i dati contenuti nella tabella technologies del database laravel-portfolio

        return view ('technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // recupero tutti i valori di technology dalla sua tabella:
        $technologies = Technology::all();
        return view('technologies.create', compact('technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);

        $newTechnology = new Technology();
        // Assegno alla variabile $data tutti i valori ricevuto dal form
        $data = $request->all();    //assegno alla variabile $data tutti i valori inseriti nel form

        $newTechnology->name = $data['name'];
        $newTechnology->color = $data['color'];
        $newTechnology->description = $data['description'];

        $newTechnology->save();   //salvo i nuovi dati nella tabella technologies del database

        // Reindirizzo l'utente alla pagina show per vedere il technologies che ha salvato ($newTechnology->id è equivalente a $newTechnology))
        return redirect()->route('technologies.show', $newTechnology->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Technology $technology)
    {
        return view('technologies.show', compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology)
    {
        return view("technologies.edit", compact("technology"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Technology $technology)
    {
        // Prima prendiamo le richieste e le salviamo su un array letterale:
        $data = $request->all();

        $technology->name = $data['name'];
        $technology->color = $data['color'];
        $technology->description = $data['description'];

        $technology->update();      //aggiorno il tipo di tecnologia nel database

        // Reindirizzo l'utente alla pagina show per vedere il tipo di tecnologia che ha modificato ($technology->id è equivalente a $technology))
        return redirect()->route("technologies.show", $technology);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        // dd($id);

        //PRIMA DI TUTTO eliminiamo tutte le CHIAVI DI PROJECTS (se presenti) collegate alla tabella ponte, in caso contrario riceveremmo un errore e non riusciremmo a cancellare il record, perchè ha le key associate alla tabella ponte "project_technology" e ho bisogno di eliminare prima quelle con il metodo detach():
        $technology->projects()->detach();    // eliminiamo tutti i valori di projects dalla tabella ponte collegati al progetto da eliminare

        $technology->delete();    //cancello la tecnologia

        // Reindirizzo l'utente alla pagina index che restituisce tutti i $technology contenuti nella tabella $technologies. Oltre a reindirizzarli nella index, tramite il metodo width() passo anche un dato alla sessione temporanea di tipo "success" con un messaggio "flash" specificato
        return redirect()->route('technologies.index')->with('success', 'Progetto cancellato con successo');
    }
}
