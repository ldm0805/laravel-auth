<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; //NECESSARIO  
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Recupero tutti i dati dal database
        $projects = Project::all();

        //Rimando alla view
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        // Ottengo i dati validati dalla richiesta
        $form_data = $request->validated();
    
        // Genero uno slug tramite una funzione (project.php) dal titolo del progetto
        $slug = Project::generateSlug($request->title);
    
        // Lo slug viene aggiunto ai dati del form
        $form_data['slug'] = $slug;
    
        // Creo un nuovo progetto nel database utilizzando i dati del form
        $newProj = Project::create($form_data);
    
        // Reindirizzamento all'index con messaggio di conferma crezione
        return redirect()->route('admin.projects.index')->with('message', 'Project creato correttamente');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //Elimino il project dal database;
        $project->delete();

        // Reindirizzamento all'index con messaggio di conferma eliminazione
        return redirect()->route('admin.projects.index')->with('messagedelete', 'Project eliminato correttamente');

    }
}
