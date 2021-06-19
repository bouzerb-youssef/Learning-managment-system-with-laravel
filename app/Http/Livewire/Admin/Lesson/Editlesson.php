<?php

namespace App\Http\Livewire\Admin\Lesson;

use App\Jobs\ConvertForStreaming;
use App\Jobs\CreateThumbnailFromVideo;

use Livewire\Component;
use App\Models\Section;
use App\Models\Lesson;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class Editlesson extends Component
{
    use WithFileUploads;


 
    public Lesson $lesson;
    public $title;
    public $duration;
    public $vedio;

    protected $rules = [
        'vedio' => 'required|mimes:mp4|max:12288000'
    ];

    public function mount(Lesson $lesson){

      $this->lesson=$lesson;

    }

    public function edit()
    {
      

      //dd($this->lesson->title);
         // validation
        $this->validate([
            'title' => 'required|max:250',
            'duration' => 'required|integer',
            'vedio' => 'required',
          ]); 
        File::deleteDirectory(storage_path('app/public/lessons/'.$this->lesson->title));
        $path = $this->vedio->store('public/lessons-temp');

        //create video record in sb
     $lesson=Lesson::findorfail($this->lesson->id)->update([
            'title' =>$this->title,
            'duration' => $this->duration,
            'video' => explode('/lessons-temp', $path)[1],
            'section_id'=>$this->lesson->section_id,
        ]);

//dispatch jobs
      CreateThumbnailFromVideo::dispatch($this->lesson);
      ConvertForStreaming::dispatch($this->lesson);
 
           
            $this->title="";
            $this->duration="";
            $this->vedio="";  
           
        //redirect to edit route
        $cource_id=section::with("cource")->find($this->lesson->section_id);

        toastr()->success('.لقد تم التعديل  بنجاح');

        return redirect()->route("admin.sections",$cource_id->cource->id);
   
       
    }

   

    public function remove($id){

      $lesson = lesson::Find($id);
        if($lesson){
        
            Storage::disk("lessons")->delete($lesson->video);
            $lesson->delete();
        }
    
      //$this->comments =$this->comments->except($id);
     
     }
    public function render()
    {
       // $section =Section::find($this->section_id);
        return view('livewire.admin.lesson.editlesson');
    }
}
