<?php
namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

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

    public function index(): View
    {
        $projects = Project::latest()->paginate(3);

        return view('director.index', compact('projects'));
    }

    public function create(): View
    {
        return view('director.create');
    }

    public function store(StoreProjectRequest $request): RedirectResponse
    {
        Project::create($request->all());

        return redirect()->route('director.projects.index')->with('success', 'New project added');
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
