<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Categorybook;
use App\Models\Section;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

use Intervention\Image\ImageManagerStatic;
use Illuminate\Support\Str;
class Addcategorybook extends Component
{
    use WithFileUploads;
    public $title;
   
    public $thumbnail;


    public function addcategorybook(){
        $this->validate([
            'title' => 'required|max:70',
            'thumbnail' => 'required',
            
          ]);  
          $img   = ImageManagerStatic::make($this->thumbnail)->resize(300,390)->encode('jpg');
         
          $name  = Str::random() .'book'.'jpg';

          Storage::disk('books')->put($name, $img);
          $createcategorybook = Categorybook::create([

            "title"=> $this->title,
          
            "thumbnail"=>$name,
    
            ]);
           
            //$createdcourcedetail->save();
            $this->title ="";
            $this->thumbnail ="";
           
            session()->flash('message', 'Comment added successfully 😊');

    }


    public function remove($id){

        $categorybook = Categorybook::Find($id);
  
      
        if( $categorybook){
         
  
      
         
          $categorybook->books()->delete();
          $categorybook->delete();
      }


    }







    public function render()
    {
        $categorybooks = Categorybook::get();
        return view('livewire.admin.addcategorybook',compact("categorybooks"));
    }
}
