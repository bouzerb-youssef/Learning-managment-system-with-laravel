<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Cource;
use App\Models\User;
use App\Models\Lesson;
use App\Models\Section;
use App\Models\Material;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{


   
    public function index(){
      $categories = Category::get();
         return view("admin.categories.categorylist",compact("categories"));
        
  
     }
    

     public function  addcategory(){
      $categories = Category::all();
         return view("admin.categories.addcategory", compact('categories'));

     }
     public function remove($id){

      $category = Category::with('cources')->find($id);
    
      
      if($category){
      
      
       
        foreach( $category->cources as $cource){
      
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
        
     
      }
      $category->delete();
    }
        
        
        toastr()->error('.لقد تم المسح بنجاح');

        return redirect()->back();
  
      
  }

  public function editcategory($id){
    $category = Category::findorfail($id);
       return view("admin.categories.editcategory",compact("category"));
      
   }

   public function editcategoryupdate($id,Request $request){
   
  
 /*   $this->validate([
           'title' => 'required',
         ]);  */ 
 
       $addcategory = Category::findorfail($id)->update([
       
           "title"=>$request['title'],
           ]);


          


       return redirect()->route('admin.categories')->with('message', '.لقد تم التعديل بنجاح ');
      
   }

  
   public function  storecategory(Request $request){
     
      $request->validate([
           'title' => 'required|max:70',
         ]);  
 
       $addcategory = Category::create([
 
           "title"=>request('title'),
          
       
   
           ]);
          
           $addcategory->save();
          
           toastr()->success('.لقد تم الاضافة  بنجاح');

       return redirect()->route('admin.categories');
  
   }
   
 
}
