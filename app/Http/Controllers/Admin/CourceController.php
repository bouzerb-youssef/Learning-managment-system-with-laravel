<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cource;
use App\Models\Category;
use App\Models\Section;
use App\Models\Material;
use App\Models\Lesson;
use App\Models\Option;
use App\Models\Question;
use App\Models\whatinthecoure;
use Intervention\Image\ImageManagerStatic;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;


class CourceController extends Controller
{
    public function index(){
      $lessons=Cource::with('lessons')->get();
        $cources=Cource::with('enrolls')->paginate(9);
        //dd($cources);
         return view("admin.cources.Courcelist",compact("cources"));
     }

     public function edit($id){

        $cource=Cource::with('category')->find($id);
        $categories=Category::all();

         return view("admin.cources.editcource",compact("cource","categories"));

     }

     public function addcourcesection($id){

    
          $cource=Cource::find($id);

        
        //dd($cource);
          return view("admin.cources.addcourcesection",compact("cource"));

     }

     public function remove($id){

      $cource = Cource::with('courceQuestions','options','lessons','materials')->find($id);
     // dd( $cource);
      
       if($cource){
         
         // foreach( $cource->enrolls as $enroll){
         //   if( $enroll){
                
          //      $enroll->delete();
          //    }
          //  }
       //   foreach( $cource->courceQuestions as $question){
        //  if( $question){
         //   Storage::disk("questions")->delete($question->audio);
           //   $question->delete();
        // //   }
        //  }
         
        //  foreach( $cource->options as $option){
         //   if( $option){
          //    Storage::disk("options")->delete($option->image);
          //    $option->delete();

        //    }}
            /* delete lessson */
     // foreach( $cource->lessons as $lesson){
       // if( $lesson){
        //  File::deleteDirectory(storage_path('app/public/lessons/'.$lesson->name));
       //   $lesson->delete();
       // }}
/* delete materials */

     foreach( $cource->materials as $material){
      if( $material){
           
        $path = public_path()."/materials/".$material->material;
        unlink($path);
         
               $material->delete();
      }
    }
          Storage::disk("cources")->delete($cource->thumbnail);
          
          $cource->delete();  
        }

/* delete questions and options */
      
       
        toastr()->error('.لقد تم المسح  بنجاح');

     return redirect()->back();
    
     
    
    }

     public function  addlesson($id){

        $section=Section::find($id);

       
       // dd($cource);
         return view("admin.lessons.addlesson",compact("section"));

     }
     
   public function updatecource($id,Request $request){
   // try {  
      $cource= Cource::findorfail($id);
     
       
      if(request('thumbnail')){
        Storage::disk("cources")->delete($cource->thumbnail);
        $name  = Str::random() .'cource'.'jpg';
        $update = Cource::findorfail($id)->update([
          "title"=> request('title'),
          "description"=>request('description'),
          "thumbnail"=> $name,
          "category_id"=> request('category_id'),
          ]);
          $thumbnail = $request['thumbnail'];
     
          $img   = ImageManagerStatic::make($request->thumbnail)->encode('jpg');
          Storage::disk('cources')->put($name, $img);
      }
      $update = Cource::findorfail($id)->update([
        "title"=> request('title'),
        "description"=>request('description'),
       
        "category_id"=> request('category_id'),
        ]);     
        return redirect()->route('admin.index');  
   // }
  
   // catch (\Exception $e){
    //    return redirect()->back()->withErrors(['error' => $e->getMessage()]);
   // }

      
      }


     
     public function  addmaterialtosection($id){

      $section=Section::find($id);

       return view("admin.cources.addmaterialtosection",compact("section"));

   }



     public function store(Request $request)
   
     {
     // DB::beginTransaction();
     // try {  
        $request->validate([
          'title' => 'required',
          'description' => 'required',
         // 'description' => 'required',
        
         // 'level' => 'required', 
          'thumbnail' => 'required', 
         
          //'detail' => 'required', 
         'category_id' => 'required',
     ]);

     $thumbnail=request('thumbnail');

     $img   = ImageManagerStatic::make($request->thumbnail)->resize(367,190)->encode('jpg');
    
    $name  = Str::random() .'cource'.'jpg';
  
    Storage::disk('cources')->put($name, $img);

      $createdCource = Cource::create([

       "title"=> request('title'),
       "description"=>request('description'),
       "thumbnail"=> $name,
       "category_id"=> request('category_id'),
      ]); 
    
     //DB::commit();

     return redirect()->route('admin.index');
           
     // }
     // catch (\Exception $e){
     //   DB::rollback();
     //    return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    // }

         
     }


     
     public function  addcource(){
    
      $categories = Category::all();
      $cources = Cource::all();
      return view('admin.cources.addcource',compact('categories','cources'));

   }



   public function  addcourcedetail($id){
    
    
    $cource = Cource::select("id")->find($id);
  
    return view('admin.cources.addcourcedetails',compact('cource'));

 }


 

}
