<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash; 
use Illuminate\Http\Request;


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
        $clientId = auth()->id();
    
        $projects = Project::where('client_id', $clientId)->latest()->paginate(3);
    
        $name = Auth::user()->name ; 
        return view('projects.index', compact('projects','name'));
    }
    public function list()
    {
        $clientId = auth()->id();
    
        $projects = Project::where('client_id', $clientId)->latest()->paginate(3);
    
        $name = Auth::user()->name ; 
        return view('projects.list', compact('projects','name'));

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
        // Check if a file was uploaded
        if ($request->hasFile('logo')) {
            // Get the uploaded file
            $logo = $request->file('logo');
            
            // Store the file and get its path
            $logoPath = $logo->store('logos', 'public');
        } else {
            // Handle the case where no file was uploaded
            $logoPath = null;
        }
    
        // Create the project
        $project = Project::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'due_date' => $request->input('due_date'),
            'client_id' => auth()->id(),
            'logo' => $logoPath,
        ]);
    
        // Redirect to the projects index page with a success message
        return redirect()->route('projects.index')->withSuccess('New project added');
    }
    

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Models\Project  $project
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(Project $project)
    // {
    //     return view('projects.update',[
    //         'project' => $project 
    //     ]);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    

  
   

    public function settings()
    {
        $user = Auth::user(); 
        $name = Auth::user()->name ; 

        return view('projects.settings', compact('user','name'));
    }

   
    public function updateSettings(Request $request): RedirectResponse
    {
        $user = Auth::user();  

        // Validate the request inputs
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'company' => 'required|string|max:255',
        ]);

        // Check if a new profile picture is uploaded
        if ($request->hasFile('profile_picture')) {
            // Delete the old profile picture if it exists
            if ($user->profile_picture) {
                \Storage::disk('public')->delete($user->profile_picture);
            }

            // Store the new profile picture
            $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $profilePicturePath;
        }

        // Update user details
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->company = $request->input('company');
        $user->save();

        return redirect()->route('projects.index')->with('success', 'Settings updated successfully.');
    }



 /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */

    public function edit(Project $project) : View
    {
        return view('projects.edit', compact('project'));
    }
    
   

     public function update(UpdateProjectRequest $request, Project $project): RedirectResponse
{
    // Validate the request data
    $project->update([
        'name' => $request->input('name'),
        'description' => $request->input('description'),
        'status' => $request->input('status'),
        'due_date' => $request->input('due_date'),
    ]);

    return redirect()->route('projects.index')->withSuccess('Project updated successfully');
}

     



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.list')->withSuccess('Project deleted successfully');
    }
}
