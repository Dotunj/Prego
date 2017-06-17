<?php

namespace Prego\Http\Controllers;

use Auth;
use Prego\Project;
use Prego\User;
use Prego\Task;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::personal()->get();

        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=> 'required|min:3',
            'due-date'=>'required|date|after:today',
            'notes'=>'required|min:10',
            'status'=>'required'
    ]);
        $project = new Project;
         
         $project->project_name= $request->input('name');
         $project->project_status= $request->input('status');
         $project->due_date = $request->input('due-date');
         $project->project_notes= $request->input('notes');
         $project->user_id= Auth::user()->id;

         $project->save();

         return redirect()->route('projects.index')->with('info', 'Your Project has been created Successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);
        $tasks = $this->getTasks($id);

        return view('projects.show', compact('project', 'tasks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);

        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $project = Project::findorFail($id);
          $this->validate($request, [
              'project_name'=> 'required|min:3',
               'due-date'=> 'required|date|after:today',
                'project_notes' => 'required|min:10',
                'project_status'=> 'required'
            ]);

            $values = $request->all();
            $project->fill($values)->save();

            return redirect()->back()->with('info', 'Your Project has been updated Successfully'); 


    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::findorFail($id);
        $project->delete();

        return redirect()->route('projects.index')->with('info', 'Project deleted Successfully');
    }

    public function getTasks($id)
     {
        $tasks = Task::project($id)->get();
        return $tasks;
     }
}
