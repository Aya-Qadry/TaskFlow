<?php
namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use App\Models\Team;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;


class DirectorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-project|edit-project|delete-project', ['only' => ['index', 'show']]);
        $this->middleware('permission:create-project', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-project', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-project', ['only' => ['destroy']]);
    }

 
 
    public function index()
    {
        $clientRole = Role::where('name', 'client')->first();
    
        $clients = $clientRole->users;
    
        $clientsByMonth = $clients->groupBy(function ($client) {
            return Carbon::parse($client->created_at)->format('M Y');
        });
    
        $labels = array_reverse(array_keys($clientsByMonth->toArray()));
        $data = array_reverse(array_values($clientsByMonth->map(function ($monthClients) {
            return $monthClients->count();
        })->toArray()));
    
        $teams = Team::with('manager')->get();
    
        $name = Auth::user()->name;
    
        return view('director.index', compact('labels', 'data', 'teams', 'name'));
    }

    public function projects():View{
        $projects = Project::latest()->paginate(3);
        $name = Auth::user()->name;

        return view('director.projects',
                     compact('projects','name')) ; 
    }

    

    public function createTeam() : View{
        $teamManagers = User::role('team_manager')->get();

        return view('director.createTeam',
                     compact('teamManagers')) ; 
    }

    public function storeTeam(StoreTeamRequest $request) : RedirectResponse{

        $team = Team::create([
            'name' => $request->input('name') , 
            'description' =>  $request->input('description') , 
            'team_manager' =>  $request->input('team_manager')
            // 'status' => 'pending'
        ]);
        

        return redirect()->route('director.index')->with('success','new team added') ;
    }

    public function create(): View
    {
        return view('director.create');
    }

   

    public function edit(Project $project): View
    {
        return view('director.edit', compact('project'));
    }

    public function update(UpdateProjectRequest $request, Project $project): RedirectResponse
    {
        $project->update($request->all());

        return redirect()->route('director.projects.index')->with('success', 'Project updated successfully');
    }

    public function destroy(Project $project): RedirectResponse
    {
        $project->delete();

        return redirect()->route('director.projects.index')->with('success', 'Project deleted successfully');
    }
}
