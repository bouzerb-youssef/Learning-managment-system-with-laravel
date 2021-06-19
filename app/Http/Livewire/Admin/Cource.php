<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManagerStatic;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;


class Cource extends Component
{
    use WithFileUploads;

public $title,$short_description,$thumbnail,$category_id;
 public $cource_id,$section=array(),$description=array();
 public $detail=array();
 public $categories;

 public $updateMode = false;
    public $inputs = [];
    public $i = 1;
 
    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs ,$i);
    }
 
    public function remove($i)
    {
        unset($this->inputs[$i]);
    }
 

 public function  mount($categories){

     $this->categories = $categories;
 }
 public function store()
   
     {
        
   
       // $this->validate([
        //  'title' => 'required',
        //  'short_description' => 'required',
         // 'description' => 'required',
        
         // 'level' => 'required', 
         // 'thumbnail' => 'required', 
         
          //'detail' => 'required', 
         //'category_id' => 'required',
     //]);

     $thumbnail=$this->thumbnail;

     $img   = ImageManagerStatic::make($this->thumbnail)->resize(367,190)->encode('jpg');
    
    $name  = Str::random() .'cource'.'jpg';
  
     Storage::disk('cources')->put($name, $img);

      $createdCource = Cource::create([

       "title"=> $this->title,
       "short_description"=>$this->short_description,
   //  "description"=>$this->description,
      // "level"=>$this->level,
       "thumbnail"=>$this->title,
       //"detail"=> $this('detail'),
       "category_id"=> $this->category_id,
      ]); 
  dd( $createdCource);
     // $sections = $this->input('section', []);

  
    /// $descriptions = $this->input('description', []);
      // return  $descriptions;
   // for($section = 0; $section < count( $sections); $section++){
    //     Section::create([

     //     "section"=> $sections[$section],
    //    "description"=>$descriptions[$section],
     //    "cource_id"=>  $createdCource->id ,
     //     ]);
   //   }
   foreach ($this->detail as $key => $value) {
    whatinthecoure::create(['detail' => $this->detail[$key]]);
}

      //$details = $this->input('detail', []);
    //  return  $details ;
    //  for($detail = 0; $detail < count( $details); $detail++){
     //   whatinthecoure::create([

      //   "detail"=> $details[$detail],
        
       //  "cource_id"=>  $createdCource->id ,
        // ]);
     //}
   

     return redirect()->route('admin.index');
           
     
    
    

         
     }


















    public function render()
    {
        return view('livewire.admin.cource');
    }
}
