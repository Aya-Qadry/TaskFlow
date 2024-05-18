<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ProjectController extends Controller
{

     /**
     * Instantiate an object.
     */
    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('permission:create-project|edit-project|delete-project', ['only' => ['index','show']]);
       $this->middleware('permission:create-project', ['only' => ['create','store']]);
       $this->middleware('permission:edit-project', ['only' => ['edit','update']]);
       $this->middleware('permission:delete-project', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * 
     */
    public function index()
    {
        return view('projects.index', [
            'projects' => Project::latest()->paginate(3)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * 
     */
    public function create()
    {
        return view('projects.create') ; 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        // Project::create($request->all());

        $project = new Project();
        $project->name = $request->input('name');
        $project->description = $request->input('description');
        $project->due_date = $request->input('due_date') ; 
        $project->client_id = Auth::id(); 
        // print(Auth::id()) ; 
        $project->save();

        return redirect()->route('projects.index')->withSuccess('New project added ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('projects.show',[
            'project' => $project 
        ]);
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
        //
    }
}
