<?php

namespace App\Http\Livewire\Admin\categories;

use Livewire\Component;
use App\Models\Category;
class Addcategory extends Component
{
  
 
  public $title;


 


  public function addcategory(){
     
   $this->validate([
          'title' => 'required|max:70',
        ]);  

      $addcategory = Category::create([

          "title"=> $this->title,
         
      
  
          ]);
         
          //$createdcourcedetail->save();
          $this->title ="";
          
          session('message', '.لقد تم الانشاء بنجاح ');
  }
  



  public function remove($id){

    $category = Category::Find($id);

  
    if( $category){
     

   /*  foreach($section->lessons() as $lesson){
      $deletlesson = lesson::Find($lesson->id);
      if($deletlesson){
      
          Storage::disk("public")->delete($deletlesson->video);
          $lesson->delete();
      }
     
  
     }; */
     
/*       $section->lessons()->delete();

 */      $category->delete();
  }
   
   }

  public function render()
  {

      $categories = Category::all();

    return view('livewire.admin.categories.addcategory',compact('categories'))->extends('admin.layouts.app');

  }
}
