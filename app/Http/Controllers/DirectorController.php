<?php
namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use App\Models\Team;
use Spatie\Permission\Models\Role;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateProjectRequest;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

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
        // Existing client-related functionality
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

        $cityData = DB::table('users')
            ->select(DB::raw('city, COUNT(*) as count'))
            ->groupBy('city')
            ->get();

        $cityLabels = $cityData->pluck('city')->toArray();
        $cityCounts = $cityData->pluck('count')->toArray();

        return view('director.index', compact('labels', 'data', 'teams', 'name', 'cityLabels', 'cityCounts'));
    }



    public function edit(Project $project): View 
    {
        $name = Auth::user()->name;
        return view('director.edit', compact('project','name'));
    }


    public function projects():View{
        $projects = Project::latest()->paginate(4);
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
        $name = Auth::user()->name;

        return view('director.create');
    }

   

    public function update(UpdateProjectRequest $request, Project $project): RedirectResponse
    {
        $project->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
        ]);


        return redirect()->route('director.projects')->with('success', 'Project updated successfully');
    }

     

    public function destroy(Project $project): RedirectResponse
    {
        $project->delete();

        return redirect()->route('director.projects')->with('success', 'Project deleted successfully');
    }

    public function destroyClient(User $user): RedirectResponse
    {
        $user->delete();
    
        return redirect()->route('director.indexClients')->with('success', 'Client deleted successfully');
    }

    // -------------------------- CLIENTS
    public function indexClients():View{
        $clients = User::role('client')
              ->latest()
              ->paginate(4);

        $name = Auth::user()->name;

        return view('director.clients.index',
                     compact('clients','name')) ; 
    }

    public function settings(){
        $user = Auth::user(); 
        $name = Auth::user()->name ; 

        return view('director.settings', compact('user','name'));
    }

    public function updateSettings(Request $request)
    {
        // Validate the request inputs
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . auth()->id(),
            'password' => 'nullable|string|min:6',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Update user details
        $user = auth()->user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        if ($request->hasFile('profile_picture')) {
            // Store the new profile picture
            $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $profilePicturePath;
        }
        $user->save();
    
        return redirect()->route('director.settings')->with('success', 'Settings updated successfully.');
    }
    

}
