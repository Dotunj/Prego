<?php

namespace Prego\Http\Controllers;
use Auth;
use Prego\Task;
use Illuminate\Http\Request;

class ProjectTasksController extends Controller
{
    public function postNewTask(Request $request, $id, Task $task)
    {
      $this->validate($request, [
          'task_name'=>'required|min:5',
  	]);

      $task->task_name = $request->input('task_name');
      $task->project_id = $id;

       $task->save();

       return redirect()->back()->with('info', 'Task created successfully');
    }

    public function getoneProjectTask($projectId, $taskId)
    {

         $task= Task::where('project_id', $projectId)
                     ->where('task_id', $taskId)
                     ->first();
        return view('tasks.edit')->withTask($task)->with('projectId', $projectId);
}
}