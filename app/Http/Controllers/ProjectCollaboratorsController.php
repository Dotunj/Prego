<?php

namespace Prego\Http\Controllers;

use Auth;
use Prego\User;
use Prego\Project;
use Prego\Collaboration;
use Illuminate\Http\Request;

class ProjectCollaboratorsController extends Controller
{
    public function addCollaborator(Request $request, $id, Collaboration $collaboration)
    {
    	$this->validate($request, [
          'collaborator'=>'required|min:5',
 ]);
   $collaborator_username = substr(trim($request->input('collaborator')),1);
   $collaboration->project_id = $id;
   if(is_null($this->getId($collaborator_username)))
   {
      return redirect()->back()->with('warning', 'This user does not exist');
   }
  $collaborator = $this->isCollaborator($id, $this->getId($collaborator_username));
  if(!is_null($collaboration))
  {
  	return redirect()->back()->with('warning', 'This user is already a collaborator on this project');
  }
  $collaboration->collaborator_id = $this->getId($collaborator_username);
  $collaboration->save();

  return redirect()->back()->with('info', "{$collaborator_username} has been added to your project");  
    }

    private function getId($username)
    {
    	$result = User::where('username', $username)->first();

    	return (is_null($result)) ? null : $result->id;
    }
    private function isCollaborator($projectId, $collaboratorId)
    {
    	return Collaboration::where('project_id', $projectId)
    	                    ->where('collaborator_id', $collaboratorId)
    	                    ->first();
    }
}
