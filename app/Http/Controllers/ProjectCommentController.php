<?php

namespace Prego\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Prego\Comment;

class ProjectCommentController extends Controller
{
   public function postNewComment(Request $request, $id, Comment $comment)

   {
     $this->validate($request, [
     	'comments' => 'required|min:5',
 ]);    
  $comment->comments = $request->input('comments');
  $comment->project_id = $id;
  $comment->user_id = Auth::user()->id;
  $comment->save();

  return redirect()->back()->with('info', 'Comment posted successfully');

   }   
}
