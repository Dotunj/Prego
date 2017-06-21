<?php

namespace Prego\Http\Controllers;

use Cloudder;
use Prego\File as File;
use Illuminate\Http\Request;

class FilesController extends Controller
{
   public function uploadAttachments(Request $request, $id)
   {
   	  $this->validate($request, [
          'file_name'=> 'required|mimes:jpeg,bmp,png,pdf|between:1, 7000',
      ]);

      $filename = $request->file('file_name')->getRealPath();

      Cloudder::upload($filename, null);
      list($width, $height) = getimagesize($filename);

      $fileUrl = Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);
      $this->saveUploads($request, $fileUrl, $id);

      return redirect()->back()->with('info', 'Your Attachment has been uploaded successfully');
   }

   private function saveUploads(Request $request, $fileUrl, $id)
   {
   	$file = new File; 
   	$file->file_name = $request->file('file_name')->getClientOriginalName();
   	$file->file_url = $fileUrl;
   	$file->project_id = $id;
   	$file->save();
   }
}
