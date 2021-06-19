<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Material;
use App\Models\Section;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Addmaterialtosection extends Component
{
    use WithFileUploads;
  
    public $section_id;
    public $title;
    public $description;
    public $material;

    public function mount($section){
      $this->section_id=$section->id;
    }


    public function addmataerialtomaterial(){

        $this->validate([
            'title' => 'required|max:70',
            'description' => 'required|max:70',
            'material' => 'required',
          ]);  

          $path = $this->material->store('public/materials');

          $createdcourcedetail = Material::create([

            "title"=>$this->title,
            "description"=>$this->description,
            "section_id"=>$this->section_id,
            "material"=>explode('/materials', $path)[1],
            ]);
           
            //$createdcourcedetail->save();
            $this->title ="";
            $this->description ="";
            $this->material ="";

            session()->flash('message', 'Comment added successfully 😊');

    }
    

  
    public function remove($id){

      $material = Material::Find($id);
      Storage::disk("materials")->delete($material->material);
      $material->delete();
      
    
      //$this->comments =$this->comments->except($id);
     
     }
     
    
  
    public function render()
    {

        $section = Section::with("materials")->find($this->section_id);
       
        return view('livewire.admin.addmaterialtosection',compact('section'));

    }
}
