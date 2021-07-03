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
use Vimeo\Laravel\Facades\Vimeo;
class LessonController extends Controller
{

  public function index(){

    $lessons = Lesson::paginate(12);
    

  
 
   
   return view('admin.lessons.lessons',compact('lessons'));
   }









    public function  addlesson(){

        $cources=Cource::all();
     
         return view("admin.lessons.addlesson",compact("cources"));
    }

    public function  editlesson($id){

        $lesson=Lesson::find($id);
        $cources=Cource::all();
         return view("admin.lessons.editlesson",compact("lesson",'cources'));

    }

     
    public function remove($id,VimeoManager $vimeo,Request $request){

        $lesson = Lesson::Find($id);
     //   dd($lesson->title);
          if($lesson){
            Vimeo::request($lesson->video, ['per_page' => 10], 'delete');
              
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
            'cource_id' => 'required',
        ]);

      $video= $vimeo->upload($request->video,[
          'name'=>$request->name,
      ]);
      $createdCource = Lesson::create([

        "name"=> request('name'),
        "video"=> $video,
     
        "cource_id"=>request('cource_id'),
       ]); 
       toastr()->success('.لقد تم الانشاء  بنجاح');

       return redirect()->route("admin.lessons");

  }
  
  public function  update($id,Request $request , VimeoManager $vimeo){

    $lesson = Lesson::findorfail($id);

    $request->validate([
        'name' => 'required',
        //'video' => 'required',
        'cource_id' => 'required',
    ]);
    if(request('video')){
      Vimeo::request($lesson->video, ['per_page' => 10], 'delete');

      $video= $vimeo->upload($request->video,[
          'name'=>$request->name,
      ]);
      $createdCource = Lesson::findorfail($id)->update([
    
        "name"=> request('name'),
        "video"=> $video,
     
        "cource_id"=>request('cource_id'),
       ]); 

    }
    $createdCource = Lesson::findorfail($id)->update([
    
      "name"=> request('name'),
   
      "cource_id"=>request('cource_id'),
     ]); 

    
   toastr()->success('.لقد تم الانشاء  بنجاح');

   return redirect()->route("admin.lessons");

}




}
