<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Client;
use App\Models\Employee;
use Illuminate\Http\Request;
use DB;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request);
        $projects=Project::paginate(15);
        $employees=Employee::all();
        if($request->has('query')) {
			$projects = Project::filter(request(['query','project_name', 'project_manager']))->paginate(12);
			// dd($employees);
		}
        return view('admin.project.index', ['projects'=>$projects, 'employees'=>$employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $clients = Client::all();
        return view('admin.project.create', ['clients' => $clients]);
        // return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
			'project_name' => 'required',
			
		]);
        DB::transaction(function () use ($request) {
            $project = new Project(); 

            // $client->client_contact_person = json_encode($request->client_contact_person);
            // $client->client_contact_number = json_encode($request->client_contact_number);
            // $client->client_contact_email = json_encode($request->client_contact_email);
            $project->client_id=$request->client_id;
            $project->fill($request->all());
            // dd($project);
            $project->save();
            return $project;
        });
        toast('You have created Project, Successfully ', 'success', 'top-right');
        return redirect()->route('admin.projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project) 
    {
        // dd('show');
        $project = Project::findOrFail($project->id);
        // dd($project->client->client_name);
        return view('admin.project.show', ['project' => $project]);

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
        // dd($project);
        // $clients=Client::paginate(12);
        $projects=Project::findOrFail($project->id);
        // dd($projects->client->client_name);
        return view('admin.project.edit', ['project'=>$projects]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
        // dd('update');

        $this->validate($request, [
			'project_name' => 'required',
			
		]);
        DB::transaction(function () use ($request, $project) {
            // $project = new Project(); 

            // $client->client_contact_person = json_encode($request->client_contact_person);
            // $client->client_contact_number = json_encode($request->client_contact_number);
            // $client->client_contact_email = json_encode($request->client_contact_email);
            // $project->client_id=$request->client_id;
            $project->fill($request->all());
            // dd($project);
            $project->save();
            return $project;
        });
        toast('You have updated Project details, Successfully ', 'success', 'top-right');
        return redirect()->route('admin.projects.index');
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
        // dd('delete');
        $project = Project::findOrFail($project->id);
        $project->delete();
        toast('You have deleted the Project, Successfully', 'success', 'top-right');
        return redirect()->route('admin.projects.index');
    }
}
