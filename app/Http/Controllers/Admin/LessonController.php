<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Cource;
use Illuminate\Support\Facades\Storage;
use Vimeo\Laravel\VimeoManager;
use Illuminate\Support\Facades\File;
use Youtube;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function  addlesson($id){

        $cource=Cource::find($id);
     
         return view("admin.lessons.addlesson",compact("cource"));
    }

    public function  editlesson($id){

        $lesson=Lesson::find($id);
     
         return view("admin.lessons.editlesson",compact("lesson"));

    }

     
    public function remove($id){

        $lesson = Lesson::Find($id);
     //   dd($lesson->title);
          if($lesson){
          
           
            File::deleteDirectory(storage_path('app/public/lessons/'.$lesson->title));
            $lesson->delete();
          }
        
       return redirect()->back();
      
       
    }
    public function  create(){

       
     
         return view("admin.lessons.video");
    }
  /*   public function store(Request $request)
    {
        $video = Youtube::upload($request->file('video')->getPathName(), [
            'name'       => $request->input('name'),
            'description' => $request->input('description')
        ]);
 dd( $video);
        return "Video uploaded successfully. Video ID is ". $video->getVideoId();
    } */



    public function  store(Request $request , VimeoManager $vimeo){

       
        $request->validate([
            'name' => 'required',
            'video' => 'required',
        ]);

      $video= $vimeo->upload($request->video,[
          'name'=>$request->name,
      ]);
      $createdCource = Lesson::create([

        "name"=> request('name'),
        "video"=> $video,
     
        "cource_id"=> 183,
       ]); 
      return back(); 

  }



}
