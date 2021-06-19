<?php

namespace App\Http\Livewire\Admin\Categories;

use Livewire\Component;

class Editcategory extends Component
{


    public $title;


 


    public function addcategory($id){
     $category=Category::findorfail($id)  ;
     $this->validate([
            'title' => 'required|max:70',
          ]);  
  
        $addcategory = Category::update([
  
            "title"=> $this->title,
            ]);
           
            $this->title ="";
            
            session()->flash('message', 'Comment added successfully 😊');
    }
    
  
    public function render()
    {
  
       
  
      return view('livewire.admin.categories.editcategory');
  
    }
   
}
