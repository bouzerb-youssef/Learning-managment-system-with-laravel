<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Section;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function  addlesson($id){

        $section=Section::find($id);
     
         return view("admin.lessons.addlesson",compact("section"));
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

}
