<?php

namespace App\Http\Livewire\Admin\Lesson;
 use App\Jobs\ConvertForStreaming;
 use App\Jobs\CreateThumbnailFromVideo;
 use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use App\Models\cource;
use App\Models\Lesson;
use Livewire\WithFileUploads;

class Addlesson extends Component
{
    use WithFileUploads;

    public $cource_id;
    public cource $cource;
    public Lesson $lesson;
    public $name;
    public $duration;
    public $vedio;
    
    protected $rules = [
        'vedio' => 'required|mimes:mp4|max:12288000'
    ];

    public function mount(Cource $cource ){

      $this->cource=$cource;

    }

    public function fileCompleted()
    {
         // validation

        
        $this->validate([
            'name' => 'required|max:70',
            //'duration' => 'required|integer',
            'vedio' => 'required',
          ]); 
        //save the file
        $path = $this->vedio->store('public/lessons-temp');

        //create video record in sb
        $this->lesson = $this->cource->lessons()->create([
            'name' =>$this->name,
           // 'duration' => $this->duration,
            'video' => explode('/lessons-temp', $path)[1]
           
        ]);
//dispatch jobs
       CreateThumbnailFromVideo::dispatch($this->lesson);
    ConvertForStreaming::dispatch($this->lesson);
 
    // $cource_id=cource::with("cource")->find($this->cource->id);
  
        
        //redirect to edit route
        toastr()->success('.لقد تم الانشاء  بنجاح');

        return redirect()->route("admin.sections",$this->cource->id);
   
       
    }

   

    public function remove($id){

      $lesson = Lesson::Find($id);
        if($lesson){
        
            Storage::deleteDirectory("app/public/lessons/".$lesson->name);
            $lesson->delete();
        }
        toastr()->error('.لقد تم المسح  بنجاح');

     }

    public function render()
    {
        $cource =cource::find($this->cource_id);
        return view('livewire.admin.lesson.addlesson',compact("cource"));
    }
}
