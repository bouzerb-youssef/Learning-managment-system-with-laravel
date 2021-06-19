<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Cource;
use App\Models\Section;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
class Addcourcesection extends Component
{
  use WithFileUploads;
  
    public $cource_id;
    public $section;
    public $description;
 

    public function mount($cource){
      $this->cource_id=$cource->id;
    }


    public function addcourcesection(){
        $this->validate([
            'section' => 'required|max:70',
            'description' => 'required|max:500',
           
          ]);  

       

          $createdcourcedetail = Section::create([

            "section"=> $this->section,
            "description"=> $this->description,
            "cource_id"=>$this->cource_id,
           
    
            ]);
           
            //$createdcourcedetail->save();
            $this->section ="";
            $this->description ="";
          
            session()->flash('message', 'Comment added successfully 😊');

    }
    

  

    public function remove($id){

      $section = Section::Find($id);
        $section->delete();
    }
     
    
  
    public function render()
    {

        $cource = Cource::with("sections")->find($this->cource_id);
        return view('livewire.admin.addcourcesection',compact('cource'));

    }
}
