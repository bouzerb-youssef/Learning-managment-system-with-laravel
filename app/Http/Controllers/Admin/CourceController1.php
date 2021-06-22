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

      $cource = Cource::with('courceQuestions','options')->find($id);
      
        if($cource){
         
          foreach( $cource->courceQuestions as $question){
          if( $question){
               File::deleteDirectory(storage_path('app/public/questions/'.$question->audio));
              $question->delete();
            }
          }
         
          foreach( $cource->options as $option){
            if( $option){
              Storage::disk("options")->delete($option->image);
              $option->delete();

            }
                
              }
          Storage::disk("cources")->delete($cource->thumbnail);
          
          $cource->delete();  
        }
/* delete lessson */
        $lessons =Lesson::where("section_id",null)->get();
        if( $lessons){
        foreach( $lessons as $lesson){
          File::deleteDirectory(storage_path('app/public/lessons/'.$lesson->title));
          $lesson->delete();
        }}
/* delete materials */

        $materials =Material::where("section_id",null)->get();
        if( $materials){
        foreach( $materials as $material){
          
          File::deleteDirectory(storage_path('app/public/materials/'.$material->material));
          $material->delete();
        }}
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
        $cource= Cource::findorfail($id);
        Storage::disk("cources")->delete($cource->thumbnail);
         
               $request->validate([
                  'title' => 'required',
                  'short_description' => 'required',
                  'description' => 'required', 
                  'level' => 'required', 
                  'thumbnail' => 'required', 
                  'detail' => 'required', 
                  'category_id' => 'required',
              ]);
              Storage::disk("cources")->delete($cource->thumbnail);

              
              $thumbnail = $request['thumbnail'];
       
              $img   = ImageManagerStatic::make($request->thumbnail)->resize(367,190)->encode('jpg');
             
              $name  = Str::random() .'cource'.'jpg';
              Storage::disk('cources')->put($name, $img);

            $update = Cource::findorfail($id)->update([
          
           
              "title"=> request('title'),
              "short_description"=>request('short_description'),
              "description"=>request('description'),
              "level"=>request('level'),
              "thumbnail"=> $name,
              "detail"=> request('detail'),
              "category_id"=> request('category_id'),

              ]);
   
   
             
   
   
          return redirect()->route('admin.index');
      }


     
     public function  addmaterialtosection($id){

      $section=Section::find($id);

       return view("admin.cources.addmaterialtosection",compact("section"));

   }



     public function store(Request $request)
   
     {
       
         $request->validate([
             'title' => 'required',
             'short_description' => 'required',
             'desc' => 'required',
            
           
           'thumbnail' => 'required', 
         
             'category_id' => 'required',
           
           
  
         ]);
         $thumbnail=request('thumbnail');
         $img   = ImageManagerStatic::make($request->thumbnail)->resize(367,190)->encode('jpg');
        
         $name  = Str::random() .'cource'.'jpg';
         Storage::disk('cources')->put($name, $img);

         $createdCource = Cource::create([
  
           "title"=> request('title'),
           "short_description"=>request('short_description'),
           "description"=>request('description'),
           "level"=>request('level'),
           "thumbnail"=> $name,
           "detail"=> request('detail'),
           "category_id"=> request('category_id'),
           ]);;

           $createdCource->save();
         
         
   
         return redirect()->route('admin.index');
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
