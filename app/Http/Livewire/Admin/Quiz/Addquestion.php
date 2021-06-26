<?php

namespace App\Http\Livewire\Admin\Quiz;

use Livewire\Component;
use Intervention\Image\ImageManagerStatic;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Question;

use App\Models\Option;

use Livewire\WithFileUploads;

class Addquestion extends Component
{

public $question,$audio,$cource_id,$option,$points,$image;
public $cource;
public $createAccountError;
use WithFileUploads;

public function mount($cource){
    //dd($groups);
   $this->cource=$cource;

}


protected $rules = [
    'question' => 'required',
    'audio' => 'required',
    //'cource_id' => 'required',
    //'option' => 'required',
    'points' => 'required',
    'image' => 'required',
];

    public function storequestion()
   
    {
     
    DB::beginTransaction();
   
   
      try {
     $this->validate();

        $audio =$this->audio;
     
        $name = Str::random().'-'.$this->audio->getClientOriginalName();
       $storeaudio=Storage::disk('questions')->put($name, $audio);
        $createdquestion = Question::create([

          "question"=>$this->question,

           "audio"  =>    $storeaudio ,

          "cource_id"=>$this->cource->id,
          ]);

     
          $options = $this->option;
          $pointss =$this->points;
          $images =$this->image;
      // dd( $images);
          for($i = 0; $i < count($pointss); $i++){
            $image = $images[$i]; 
  
            $img   = ImageManagerStatic::make($images[$i])->resize(100,100)->encode('jpg');
           
            $name  = Str::random() .'options'. ($i) .'jpg';
            Storage::disk('options')->put($name, $img);
           $createdoption = Option::create([
    
             "option"=> $i ,
             "points"=> $pointss[$i] ,
             "image"=>$name   ,
             "question_id"=>  $createdquestion->id,
   
             ]);
}
     
    //    
       DB::commit();
          toastr()->success('.لقد تم الاضافة  بنجاح');
        return redirect()->route('admin.showquestion',$this->cource->id);
    }
   catch (\Exception $e){
        DB::rollback();
       $this->createAccountError= $e->getMessage();
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }
   
  





    public function render()
    {
    
        return view('livewire.admin.quiz.addquestion');
    }
}
