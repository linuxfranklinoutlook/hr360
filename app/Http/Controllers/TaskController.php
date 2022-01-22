<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use App\Models\Project;
use App\Models\Client;
use App\Models\Employee;
use Illuminate\Http\Request;
use DB;
use Illuminate\Database\Eloquent\JsonEncodingException;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     /**
      * Attacth / Detach code
      foreach(Task::all() as $task);
        {
         $projects = Project::inRandomOrder()->take(rand(2,3))->pluck('id');
         foreach($projects as $project)
         {
             $task->projects()->syncWithoutDetaching($project);   
         }
        }
        
        return redirect(route('tasks.index'));
      */
    public function index(Request $request)
    {
        
        $tasks = Task::with('projects','employees')->orderBy('updated_at')->paginate(12); 
        // $tasks = Task::where('project_i') 
        if($request->has('query')) { 
        	$projects = Project::filter(request(['query','developers', 'designers']))->paginate(12);
        	// dd($employees);
        }

        return view('admin.task.index', ['tasks' => $tasks]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
        $employees = Employee::all();
        $clients = Client::all(); 
        $projects = Project::all();
        $tasks = Task::all();
        return view('admin.task.create', ['employees' => $employees, 'clients' => $clients, 'projects' => $projects, 'tasks' => $tasks]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTaskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
// dd($request);
        DB::transaction(function () use ($request) {
            $tasks= new Task;
            // dd($request);
            $tasks->project_id=$request->project_id;
            $tasks->employee_id=$request->employee_id;
            $tasks->fill($request->all());
            // dd($tasks);
            
            $tasks->save();
            
       
           
          
         
        
    });
    toast('You have created New Task, Successfully ', 'success', 'top-right');
        return redirect(route('admin.tasks.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //

        // $project =Project::find(15); 
        // for($i=4; $i<=10; $i++ ) 
             
        $task=Task::findOrFail($task->id);//->pluck('id');
                //  $task->projects()->syncWithoutDetaching($employee); 
        
                // dd($task); 
                return view('task.show', ['task'=>$task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
        $task=Task::Find($task->id);
        $employees=Employee::all();
        // dd($task);
        return view('task.edit', ['task'=> $task, 'employees'=>$employees]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTaskRequest  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
        // dd($request);
        // $this->validate($request, [
		// 	'project_name' => 'required',
			
		// ]);
        DB::transaction(function () use ($request, $task) {
            
            $task->fill($request->all());
            // dd($project);
            Project::where('id',$request->project_id)->update(['current_status' => $request['task_status']]);
            Project::where('id',$request->project_id)->update(['delivered_on'=>$request['delivered_on']]);
            $task->save();
            // return $task;
        });
        toast('Task  Updated Successfully ', 'success', 'top-right');
        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }
}
