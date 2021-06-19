<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Lesson;
use Illuminate\Support\Facades\Auth;
class Episodedetails extends Component
{
    public $cource;
    public $lesson;
    public $count = 1;
    public $idvedio;
   /*  public $lesson_id; */
    public function mount($cource ,$lesson){
       $this->cource=$cource;
       $this->lesson=$lesson;
      /*  $this->lesson_id=$id; */
    
    }

    public function checkviewlesson($id){
        $lesson =Lesson::find($id);
       $user_id= Auth::user()->id;
        $lesson->users()->sync($user_id);
      $lesson->save();
    
    }
 /*    public function getid($id){
       


    } */


   function getlessonid($id){
      
      return $id;
       
    }

    public function render()
    {
       
        return view('livewire.episodedetails');
    }
}
