<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\whatinthecoure;
use App\Models\Cource;
class Courcedetailes extends Component
{

    public $cource_id;
    public $detail;


    public function mount($cource){
      $this->cource_id=$cource->id;
    }


    public function adddetail(){
        $this->validate([
            'detail' => 'required|max:255',
          ]); 
     
        $createdcourcedetail = whatinthecoure::create([

            "detail"=>$this->detail,

            "cource_id"=>$this->cource_id,
    
            ]);
          
            //$createdcourcedetail->save();
         $this->detail =""; 
            
            session()->flash('message', 'Comment added successfully 😊');
    }
    
   

     public function remove($id){

        $courcedetail = whatinthecoure::Find($id);
      
     
        if( $courcedetail){
          $courcedetail->delete();
      }
       }




  


    public function render()
    
    {
        $cource = Cource::with("whatinthecoures")->find($this->cource_id);
          // dd($courcedetails );
             return view('livewire.admin.courcedetailes',compact("cource"));
    }

}
